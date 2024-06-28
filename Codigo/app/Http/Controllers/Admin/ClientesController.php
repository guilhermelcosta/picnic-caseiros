<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\BulkDestroyCliente;
use App\Http\Requests\Admin\Cliente\DestroyCliente;
use App\Http\Requests\Admin\Cliente\IndexCliente;
use App\Http\Requests\Admin\Cliente\StoreCliente;
use App\Http\Requests\Admin\Cliente\UpdateCliente;
use App\Models\Cliente;
use App\Models\DocumentosTipo;
use App\Services\ClientesService;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ClientesController extends Controller
{

    private ClientesService $clienteService;

    public function __construct()
    {
        $this->clienteService = new ClientesService();
    }


    /**
     * Display a listing of the resource.
     *
     * @param IndexCliente $request
     * @return array|Factory|View
     */
    public function index(IndexCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cliente::class)->processRequestAndGet(
        // pass the request with params
            $request,
            ['id', 'nome', 'sobrenome', 'apelido', 'documento', 'documentos_tipo_id', 'data_aniversario', 'endereco_id', 'observacao_id'],
            ['id', 'nome', 'sobrenome', 'apelido', 'documento'],
             function ($query) {
                $query->with(['endereco', 'observacao']);
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cliente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.cliente.create');

        $tipos_documento = DocumentosTipo::where('is_ativo', true)->get();

        return view('admin.cliente.create', [
            'tipos_documento' => $tipos_documento,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCliente $request)
    {
        $this->clienteService->store($request->getSanitized());

        if ($request->ajax()) {
            return ['redirect' => url('admin/clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @return void
     * @throws AuthorizationException
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('admin.cliente.show', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('admin.cliente.edit', $cliente);

        $tipos_documento = DocumentosTipo::where('is_ativo', true)->get();

        $tipo_documento = $cliente->tipo_documento;
        $observacao = $cliente->observacao;
        $endereco = $cliente->endereco;

        $cliente = $cliente->toArray();

        if ($tipo_documento) {
            $cliente['documentos_tipo_id'] = $tipo_documento;
        }

        if (!$observacao) {
            $cliente['observacao'] = [
                'observacao' => null,
            ];
        }

        if (!$endereco) {
            $cliente['endereco'] = [
                'logradouro' => '',
                'numero' => '',
                'complemento' => '',
                'bairro' => '',
                'cidade' => '',
                'estado' => '',
                'pais' => '',
                'cep' => '',
            ];
        }

        return view('admin.cliente.edit', [
            'cliente' => $cliente,
            'tipos_documento' => $tipos_documento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCliente $request
     * @param Cliente $cliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCliente $request, Cliente $cliente)
    {
        $this->clienteService->update($request->getSanitized(), $cliente);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCliente $request
     * @param Cliente $cliente
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyCliente $request, Cliente $cliente)
    {
        $this->clienteService->destroy($cliente);

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCliente $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyCliente $request): Response
    {
        $this->clienteService->bulkDestroy($request);

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
