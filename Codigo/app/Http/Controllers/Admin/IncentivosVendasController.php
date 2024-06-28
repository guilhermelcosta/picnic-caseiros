<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StructEnums\UnidadeRepresentativaEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IncentivosVenda\BulkDestroyIncentivosVenda;
use App\Http\Requests\Admin\IncentivosVenda\DestroyIncentivosVenda;
use App\Http\Requests\Admin\IncentivosVenda\IndexIncentivosVenda;
use App\Http\Requests\Admin\IncentivosVenda\StoreIncentivosVenda;
use App\Http\Requests\Admin\IncentivosVenda\UpdateIncentivosVenda;
use App\Models\IncentivosVenda;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IncentivosVendasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexIncentivosVenda $request
     * @return array|Factory|View
     */
    public function index(IndexIncentivosVenda $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(IncentivosVenda::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'descricao', 'valor', 'unidade', 'maximo_moeda', 'inicio_vigencia', 'fim_vigencia', 'is_ativo'],

            // set columns to searchIn
            ['id', 'descricao', 'unidade']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.incentivos-venda.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.incentivos-venda.create');

        return view('admin.incentivos-venda.create', [
            'tipos_unidade_representativa' => UnidadeRepresentativaEnum::getOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIncentivosVenda $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreIncentivosVenda $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        if ($sanitized['unidade']) {
            $sanitized['unidade'] = $sanitized['unidade']['value'];
        }

        // Store the IncentivosVenda
        $incentivosVenda = IncentivosVenda::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/incentivos-vendas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/incentivos-vendas');
    }

    /**
     * Display the specified resource.
     *
     * @param IncentivosVenda $incentivosVenda
     * @throws AuthorizationException
     * @return void
     */
    public function show(IncentivosVenda $incentivosVenda)
    {
        $this->authorize('admin.incentivos-venda.show', $incentivosVenda);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param IncentivosVenda $incentivosVenda
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(IncentivosVenda $incentivosVenda)
    {
        $this->authorize('admin.incentivos-venda.edit', $incentivosVenda);

        $unidade = $incentivosVenda->unidade;
        $inicio_vigencia = $incentivosVenda->inicio_vigencia;
        $fim_vigencia = $incentivosVenda->fim_vigencia;

        $incentivosVenda = $incentivosVenda->toArray();

        if ($unidade) {
            $incentivosVenda['unidade'] = UnidadeRepresentativaEnum::getOptionByValue($unidade);
        }

        if ($inicio_vigencia) {
            $incentivosVenda['inicio_vigencia'] = substr($incentivosVenda['inicio_vigencia'], 0, 10);
        }

        if ($fim_vigencia) {
            $incentivosVenda['fim_vigencia'] = substr($incentivosVenda['fim_vigencia'], 0, 10);
        }

        return view('admin.incentivos-venda.edit', [
            'incentivosVenda' => $incentivosVenda,
            'tipos_unidade_representativa' => UnidadeRepresentativaEnum::getOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIncentivosVenda $request
     * @param IncentivosVenda $incentivosVenda
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateIncentivosVenda $request, IncentivosVenda $incentivosVenda)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        if ($sanitized['unidade']) {
            $sanitized['unidade'] = $sanitized['unidade']['value'];
        }

        // Update changed values IncentivosVenda
        $incentivosVenda->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/incentivos-vendas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/incentivos-vendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyIncentivosVenda $request
     * @param IncentivosVenda $incentivosVenda
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyIncentivosVenda $request, IncentivosVenda $incentivosVenda)
    {
        $incentivosVenda->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyIncentivosVenda $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyIncentivosVenda $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    IncentivosVenda::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
