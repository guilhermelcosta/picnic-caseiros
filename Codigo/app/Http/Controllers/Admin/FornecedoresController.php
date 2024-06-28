<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fornecedor\BulkDestroyFornecedor;
use App\Http\Requests\Admin\Fornecedor\DestroyFornecedor;
use App\Http\Requests\Admin\Fornecedor\IndexFornecedor;
use App\Http\Requests\Admin\Fornecedor\StoreFornecedor;
use App\Http\Requests\Admin\Fornecedor\UpdateFornecedor;
use App\Models\ContatosTipo;
use App\Models\Fornecedor;
use App\Services\FornecedoresService;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class FornecedoresController extends Controller
{

    private FornecedoresService $fornecedorService;

    public function __construct()
    {
        $this->fornecedorService = new FornecedoresService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexFornecedor $request
     * @return array|Factory|View
     */
    public function index(IndexFornecedor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Fornecedor::class)->processRequestAndGet(
        // pass the request with params
            $request,
            ['id', 'nome', 'endereco_id', 'nome_contato', 'observacao_id', 'is_ativo'],
            ['id', 'nome', 'nome_contato'],
            function ($query) {
                $query->with(['endereco', 'observacao', 'contatos']);
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
        return view('admin.fornecedor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.fornecedor.create');

        $tipos_contato = ContatosTipo::all()->where('is_ativo', true);

        return view('admin.fornecedor.create', [
            'tipos_contato' => $tipos_contato,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFornecedor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFornecedor $request)
    {

        $this->fornecedorService->store($request->getSanitized());

        if ($request->ajax()) {
            return ['redirect' => url('admin/fornecedores'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/fornecedores');
    }

    /**
     * Display the specified resource.
     *
     * @param Fornecedor $fornecedor
     * @return void
     * @throws AuthorizationException
     * @throws AuthorizationException
     */
    public function show(Fornecedor $fornecedor)
    {
        $this->authorize('admin.fornecedor.show', $fornecedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Fornecedor $fornecedor
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Fornecedor $fornecedor)
    {
        $this->authorize('admin.fornecedor.edit', $fornecedor);
        $tipos_contato = ContatosTipo::all()->where('is_ativo', true);
        $contatos = $fornecedor->contatos;
        $observacao = $fornecedor->observacao;
        $endereco = $fornecedor->endereco;

        $fornecedor = $fornecedor->toArray();

        if ($contatos->isEmpty()) {
            $fornecedor['contatos'] = [[
                'contato' => '',
                'contato_tipo_id' => '',
                'contato_id' => '',
            ]];
        } else {
            $fornecedor['contatos'] = [[
                'contato' => $contatos[0]->contato,
                'contato_tipo_id' => ContatosTipo::where('id', $contatos[0]->contatos_tipo_id)->get()[0],
                'contato_id' => $contatos[0]->id,
            ]];
        }

        if (!$observacao) {
            $fornecedor['observacao'] = [
                'observacao' => null,
            ];
        }
        if (!$endereco) {
            $fornecedor['endereco'] = [
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
        return view('admin.fornecedor.edit', [
            'fornecedor' => $fornecedor,
            'tipos_contato' => $tipos_contato,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFornecedor $request
     * @param Fornecedor $fornecedor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFornecedor $request, Fornecedor $fornecedor)
    {

        $this->fornecedorService->update($request->getSanitized(), $fornecedor);


        if ($request->ajax()) {
            return [
                'redirect' => url('admin/fornecedores'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/fornecedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFornecedor $request
     * @param Fornecedor $fornecedor
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyFornecedor $request, Fornecedor $fornecedor)
    {
        $this->fornecedorService->destroy($fornecedor);

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFornecedor $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyFornecedor $request): Response
    {
        $this->fornecedorService->bulkDestroy($request);

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
