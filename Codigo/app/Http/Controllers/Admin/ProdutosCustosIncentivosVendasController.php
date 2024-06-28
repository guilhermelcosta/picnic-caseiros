<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutosCustosIncentivosVenda\BulkDestroyProdutosCustosIncentivosVenda;
use App\Http\Requests\Admin\ProdutosCustosIncentivosVenda\DestroyProdutosCustosIncentivosVenda;
use App\Http\Requests\Admin\ProdutosCustosIncentivosVenda\IndexProdutosCustosIncentivosVenda;
use App\Http\Requests\Admin\ProdutosCustosIncentivosVenda\StoreProdutosCustosIncentivosVenda;
use App\Http\Requests\Admin\ProdutosCustosIncentivosVenda\UpdateProdutosCustosIncentivosVenda;
use App\Models\ProdutosCustosIncentivosVenda;
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

class ProdutosCustosIncentivosVendasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProdutosCustosIncentivosVenda $request
     * @return array|Factory|View
     */
    public function index(IndexProdutosCustosIncentivosVenda $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ProdutosCustosIncentivosVenda::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'incentivos_venda_id', 'produtos_custo_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.produtos-custos-incentivos-venda.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.produtos-custos-incentivos-venda.create');

        return view('admin.produtos-custos-incentivos-venda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProdutosCustosIncentivosVenda $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProdutosCustosIncentivosVenda $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ProdutosCustosIncentivosVenda
        $produtosCustosIncentivosVenda = ProdutosCustosIncentivosVenda::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/produtos-custos-incentivos-vendas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/produtos-custos-incentivos-vendas');
    }

    /**
     * Display the specified resource.
     *
     * @param ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda
     * @throws AuthorizationException
     * @return void
     */
    public function show(ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda)
    {
        $this->authorize('admin.produtos-custos-incentivos-venda.show', $produtosCustosIncentivosVenda);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda)
    {
        $this->authorize('admin.produtos-custos-incentivos-venda.edit', $produtosCustosIncentivosVenda);


        return view('admin.produtos-custos-incentivos-venda.edit', [
            'produtosCustosIncentivosVenda' => $produtosCustosIncentivosVenda,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProdutosCustosIncentivosVenda $request
     * @param ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProdutosCustosIncentivosVenda $request, ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ProdutosCustosIncentivosVenda
        $produtosCustosIncentivosVenda->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/produtos-custos-incentivos-vendas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/produtos-custos-incentivos-vendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProdutosCustosIncentivosVenda $request
     * @param ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProdutosCustosIncentivosVenda $request, ProdutosCustosIncentivosVenda $produtosCustosIncentivosVenda)
    {
        $produtosCustosIncentivosVenda->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProdutosCustosIncentivosVenda $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProdutosCustosIncentivosVenda $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ProdutosCustosIncentivosVenda::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
