<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StructEnums\UnidadeMedidaEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProdutosCustosController;
use App\Http\Requests\Admin\InsumosCusto\BulkDestroyInsumosCusto;
use App\Http\Requests\Admin\InsumosCusto\DestroyInsumosCusto;
use App\Http\Requests\Admin\InsumosCusto\IndexInsumosCusto;
use App\Http\Requests\Admin\InsumosCusto\StoreInsumosCusto;
use App\Http\Requests\Admin\InsumosCusto\UpdateInsumosCusto;
use App\Models\Fornecedor;
use App\Models\Insumo;
use App\Models\InsumosCusto;
use App\Models\InsumosMarca;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class InsumosCustosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexInsumosCusto $request
     * @return array|Factory|View
     */
    public function index(IndexInsumosCusto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(InsumosCusto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'insumo_id', 'insumos_marca_id', 'fornecedor_id', 'data_compra', 'quantidade', 'unidade', 'valor_compra', 'valor_unitario', 'is_atual'],

            // set columns to searchIn
            ['id', 'unidade'],

            function ($query) {
                $query->with(['fornecedor', 'insumo']);
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

        return view('admin.insumos-custo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Request $request)
    {
        $this->authorize('admin.insumos-custo.create');

        $insumo = null;
        if ($request->has('insumo_id')) {
            try {
                $insumo = Insumo::where('id', $request->query('insumo_id'))->first();
            } catch (Exception $e) {
                Log::info('Erro ao recuperar insumo: ' . $e->getMessage());;
            }
        }

        $insumos = Insumo::where('is_ativo', true)->get();
        $marcas = InsumosMarca::where('is_ativo', true)->get();
        $fornecedores = Fornecedor::where('is_ativo', true)->get();

        return view('admin.insumos-custo.create', [
            'insumo' => $insumo,
            'insumos' => $insumos,
            'marcas' => $marcas,
            'fornecedores' => $fornecedores,
            'tipos_unidade' => UnidadeMedidaEnum::getOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInsumosCusto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreInsumosCusto $request)
    {
        $referer = $request->headers->get('referer');
        $hasQueryParams = false;
        if ($referer) {
            $url_components = parse_url($referer);
            if (isset($url_components['query']) && !empty($url_components['query'])) {
                $hasQueryParams = true;
            }
        }

        // Sanitize input
        $sanitized = $request->getSanitized();

        $insumos = new Collection();
        foreach ($sanitized['insumosCustos'] as $insumoCusto) {
            $insumoCusto['data_compra'] = $sanitized['data_compra'];

            if ($insumoCusto['insumo']) {
                $insumoCusto['insumo_id'] = $insumoCusto['insumo']['id'];
            }

            if ($insumoCusto['marca']) {
                $insumoCusto['insumos_marca_id'] = $insumoCusto['marca']['id'];
            }

            if ($insumoCusto['fornecedor']) {
                $insumoCusto['fornecedor_id'] = $insumoCusto['fornecedor']['id'];
            }

            if ($insumoCusto['unidade']) {
                $insumoCusto['unidade'] = $insumoCusto['unidade']['value'];
            }

            // Store the InsumosCusto
            $insumoCusto = InsumosCusto::create($insumoCusto);
            $insumos = $insumos->push($insumoCusto->insumo);
        }

        foreach ($insumos as $insumo) {
            $insumo->updatePrecoPosDesperdicio();
        }

        ProdutosCustosController::calculaCustos($insumos);

        if ($hasQueryParams) {
            $goTo = 'admin/insumos/custos/' . $sanitized['insumosCustos'][0]['insumo']['id'];
        } else {
            $goTo = 'admin/insumos-custos';
        }

        if ($request->ajax()) {
            return ['redirect' => url($goTo), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect($goTo);
    }

    /**
     * Display the specified resource.
     *
     * @param InsumosCusto $insumosCusto
     * @throws AuthorizationException
     * @return void
     */
    public function show(InsumosCusto $insumosCusto)
    {
        $this->authorize('admin.insumos-custo.show', $insumosCusto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InsumosCusto $insumosCusto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Request $request, InsumosCusto $insumosCusto)
    {
        $this->authorize('admin.insumos-custo.edit', $insumosCusto);

        $insumo = null;
        if ($request->has('insumo_id')) {
            try {
                $insumo = Insumo::where('id', $request->query('insumo_id'))->first();
            } catch (Exception $e) {
                Log::info('Erro ao recuperar insumo: ' . $e->getMessage());;
            }
        }

        $insumos = Insumo::where('is_ativo', true)->get();
        $marcas = InsumosMarca::where('is_ativo', true)->get();
        $fornecedores = Fornecedor::where('is_ativo', true)->get();

        $insumosCusto->load(['insumo', 'marca', 'fornecedor']);
        $unidade = $insumosCusto->unidade;

        $insumosCusto = $insumosCusto->toArray();

        if ($unidade) {
            $insumosCusto['unidade'] = UnidadeMedidaEnum::getOptionByValue($unidade);
        }

        $data = [
            'data_compra' => $insumosCusto['data_compra'],
            'insumosCustos' => [$insumosCusto],
        ];

        return view('admin.insumos-custo.edit', [
            'insumosCusto' => $data,
            'insumo' => $insumo,
            'insumos' => $insumos,
            'marcas' => $marcas,
            'fornecedores' => $fornecedores,
            'tipos_unidade' => UnidadeMedidaEnum::getOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInsumosCusto $request
     * @param InsumosCusto $insumosCusto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateInsumosCusto $request, InsumosCusto $insumosCusto)
    {
        $referer = $request->headers->get('referer');
        $hasQueryParams = false;
        if ($referer) {
            $url_components = parse_url($referer);
            if (isset($url_components['query']) && !empty($url_components['query'])) {
                $hasQueryParams = true;
            }
        }

        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['insumosCustos'][0]['data_compra'] = $sanitized['data_compra'];

        if ($sanitized['insumosCustos'][0]['insumo']) {
            $sanitized['insumosCustos'][0]['insumo_id'] = $sanitized['insumosCustos'][0]['insumo']['id'];
        }

        if ($sanitized['insumosCustos'][0]['marca']) {
            $sanitized['insumosCustos'][0]['insumos_marca_id'] = $sanitized['insumosCustos'][0]['marca']['id'];
        }

        if ($sanitized['insumosCustos'][0]['fornecedor']) {
            $sanitized['insumosCustos'][0]['fornecedor_id'] = $sanitized['insumosCustos'][0]['fornecedor']['id'];
        }

        if ($sanitized['insumosCustos'][0]['unidade']) {
            $sanitized['insumosCustos'][0]['unidade'] = $sanitized['insumosCustos'][0]['unidade']['value'];
        }

        // Update changed values InsumosCusto
        $insumosCusto->update($sanitized['insumosCustos'][0]);
        $insumosCusto->insumo->updatePrecoPosDesperdicio();

        if ($hasQueryParams) {
            $goTo = 'admin/insumos/custos/' . $sanitized['insumosCustos'][0]['insumo']['id'];
        } else {
            $goTo = 'admin/insumos-custos';
        }

        if ($request->ajax()) {
            return [
                'redirect' => url($goTo),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect($goTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyInsumosCusto $request
     * @param InsumosCusto $insumosCusto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyInsumosCusto $request, InsumosCusto $insumosCusto)
    {
        $insumosCusto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyInsumosCusto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyInsumosCusto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    InsumosCusto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
