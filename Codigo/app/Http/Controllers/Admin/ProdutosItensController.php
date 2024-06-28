<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutosItem\BulkDestroyProdutosItem;
use App\Http\Requests\Admin\ProdutosItem\DestroyProdutosItem;
use App\Http\Requests\Admin\ProdutosItem\IndexProdutosItem;
use App\Http\Requests\Admin\ProdutosItem\StoreProdutosItem;
use App\Http\Requests\Admin\ProdutosItem\UpdateProdutosItem;
use App\Models\ProdutosItem;
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

class ProdutosItensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProdutosItem $request
     * @return array|Factory|View
     */
    public function index(IndexProdutosItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ProdutosItem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'produto_id', 'receita_id', 'insumo_id', 'quantidade', 'porcentagem_mao_obra', 'porcentagem_lucro'],

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

        return view('admin.produtos-item.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.produtos-item.create');

        return view('admin.produtos-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProdutositem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProdutositem $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ProdutosItem
        $produtositem = Produtositem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/produtos-itens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/produtos-itens');
    }

    /**
     * Display the specified resource.
     *
     * @param Produtositem $produtosItem
     * @throws AuthorizationException
     * @return void
     */
    public function show(Produtositem $produtositem)
    {
        $this->authorize('admin.produtos-item.show', $produtositem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Produtositem $produtosItem
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Produtositem $produtositem)
    {
        $this->authorize('admin.produtos-item.edit', $produtositem);


        return view('admin.produtos-item.edit', [
            'produtosItem' => $produtosItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProdutositem $request
     * @param Produtositem $produtosItem
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProdutositem $request, Produtositem $produtositem)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ProdutosItem
        $produtosItem->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/produtos-itens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/produtos-itens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProdutositem $request
     * @param Produtositem $produtosItem
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProdutositem $request, Produtositem $produtositem)
    {
        $produtosItem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProdutositem $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProdutositem $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Produtositem::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
