<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StructEnums\UnidadeMedidaEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Insumo\BulkDestroyInsumo;
use App\Http\Requests\Admin\Insumo\DestroyInsumo;
use App\Http\Requests\Admin\Insumo\IndexInsumo;
use App\Http\Requests\Admin\Insumo\StoreInsumo;
use App\Http\Requests\Admin\Insumo\UpdateInsumo;
use App\Http\Requests\Admin\InsumosCusto\IndexInsumosCusto;
use App\Models\Insumo;
use App\Models\InsumosCusto;
use App\Services\InsumosService;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class InsumosController extends Controller
{
    private InsumosService $insumosService;

    public function __construct()
    {
        $this->insumosService = new InsumosService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexInsumo $request
     * @return array|Factory|View
     */
    public function index(IndexInsumo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Insumo::class)->processRequestAndGet(
        // pass the request with params
            $request,

        // set columns to query
        ['id', 'descricao', 'observacao_id', 'percentual_desperdicio', 'quantidade_referencia', 'unidade_referencia', 'preco_pos_desperdicio', 'is_ativo'],

        // set columns to searchIn
        ['id', 'descricao', 'unidade_referencia'],

        // Load relationships
        function ($query) {
            $query->with('observacao');
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

    return view('admin.insumo.index', ['data' => $data]);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.insumo.create');

        return view('admin.insumo.create', [
            'tipos_unidade' => UnidadeMedidaEnum::getOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInsumo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreInsumo $request)
    {
        $this->insumosService->store($request->getSanitized());

        if ($request->ajax()) {
            return ['redirect' => url('admin/insumos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/insumos');
    }

    /**
     * Display the specified resource.
     *
     * @param Insumo $insumo
     * @return void
     * @throws AuthorizationException
     */
    public function show(Insumo $insumo)
    {
        $this->authorize('admin.insumo.show', $insumo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Insumo $insumo
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Insumo $insumo)
    {
        $this->authorize('admin.insumo.edit', $insumo);

        $unidade_referencia = $insumo->unidade_referencia;
        $observacao = $insumo->observacao;

        $insumo = $insumo->toArray();

        if ($unidade_referencia) {
            $insumo['unidade_referencia'] = UnidadeMedidaEnum::getOptionByValue($unidade_referencia);
        }

        if (!$observacao) {
            $insumo['observacao'] = [
                'observacao' => null,
            ];
        }

        return view('admin.insumo.edit', [
            'insumo' => $insumo,
            'tipos_unidade' => UnidadeMedidaEnum::getOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInsumo $request
     * @param Insumo $insumo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateInsumo $request, Insumo $insumo)
    {
        $dados = $request->getSanitized();

        $dados['observacao'] = $request['observacao'];
        $dados['observacao_id'] = $request['observacao_id'];

        $this->insumosService->update($dados, $insumo);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/insumos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/insumos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyInsumo $request
     * @param Insumo $insumo
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyInsumo $request, Insumo $insumo)
    {
        $this->insumosService->destroy($insumo);

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyInsumo $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyInsumo $request): Response
    {
        $this->insumosService->bulkDestroy($request);


        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexInsumosCusto $request
     * @return array|Factory|View
     */
    public function custosIndex(Insumo $insumo, IndexInsumosCusto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(InsumosCusto::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'insumo_id', 'insumos_marca_id', 'fornecedor_id', 'data_compra', 'quantidade', 'unidade', 'valor_compra', 'valor_unitario', 'is_atual'],

            // set columns to searchIn
            ['id', 'unidade'],
            function ($query) use ($insumo) {
                $query->with(['insumo', 'marca', 'fornecedor'])->where('insumo_id', $insumo->id);
            },
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data, 'insumo' => $insumo];
        }

        return view('admin.insumo.custo.index', ['data' => $data, 'insumo' => $insumo]);
    }
}
