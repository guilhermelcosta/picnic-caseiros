<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StructEnums\UnidadeRepresentativaEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CanaisVenda\BulkDestroyCanaisVenda;
use App\Http\Requests\Admin\CanaisVenda\DestroyCanaisVenda;
use App\Http\Requests\Admin\CanaisVenda\IndexCanaisVenda;
use App\Http\Requests\Admin\CanaisVenda\StoreCanaisVenda;
use App\Http\Requests\Admin\CanaisVenda\UpdateCanaisVenda;
use App\Models\CanaisVenda;
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

class CanaisVendasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCanaisVenda $request
     * @return array|Factory|View
     */
    public function index(IndexCanaisVenda $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CanaisVenda::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'descricao', 'comissao', 'unidade_comissao', 'desconto', 'unidade_desconto'],

            // set columns to searchIn
            ['id', 'descricao', 'unidade_comissao', 'unidade_desconto']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.canais-venda.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.canais-venda.create');

        return view('admin.canais-venda.create', [
            'tipos_unidade_representativa' => UnidadeRepresentativaEnum::getOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCanaisVenda $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCanaisVenda $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        if ($sanitized['unidade_comissao']) {
            $sanitized['unidade_comissao'] = $sanitized['unidade_comissao']['value'];
        }

        if ($sanitized['unidade_desconto']) {
            $sanitized['unidade_desconto'] = $sanitized['unidade_desconto']['value'];
        }

        // Store the CanaisVenda
        $canaisVenda = CanaisVenda::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/canais-vendas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/canais-vendas');
    }

    /**
     * Display the specified resource.
     *
     * @param CanaisVenda $canaisVenda
     * @throws AuthorizationException
     * @return void
     */
    public function show(CanaisVenda $canaisVenda)
    {
        $this->authorize('admin.canais-venda.show', $canaisVenda);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CanaisVenda $canaisVenda
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CanaisVenda $canaisVenda)
    {
        $this->authorize('admin.canais-venda.edit', $canaisVenda);

        $unidade_comissao = $canaisVenda->unidade_comissao;
        $unidade_desconto = $canaisVenda->unidade_desconto;

        $canaisVenda = $canaisVenda->toArray();

        if ($unidade_comissao) {
            $canaisVenda['unidade_comissao'] = UnidadeRepresentativaEnum::getOptionByValue($unidade_comissao);
        }

        if ($unidade_desconto) {
            $canaisVenda['unidade_desconto'] = UnidadeRepresentativaEnum::getOptionByValue($unidade_desconto);
        }

        return view('admin.canais-venda.edit', [
            'canaisVenda' => $canaisVenda,
            'tipos_unidade_representativa' => UnidadeRepresentativaEnum::getOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCanaisVenda $request
     * @param CanaisVenda $canaisVenda
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCanaisVenda $request, CanaisVenda $canaisVenda)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        if ($sanitized['unidade_comissao']) {
            $sanitized['unidade_comissao'] = $sanitized['unidade_comissao']['value'];
        }

        if ($sanitized['unidade_desconto']) {
            $sanitized['unidade_desconto'] = $sanitized['unidade_desconto']['value'];
        }

        // Update changed values CanaisVenda
        $canaisVenda->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/canais-vendas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/canais-vendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCanaisVenda $request
     * @param CanaisVenda $canaisVenda
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCanaisVenda $request, CanaisVenda $canaisVenda)
    {
        $canaisVenda->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCanaisVenda $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCanaisVenda $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CanaisVenda::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
