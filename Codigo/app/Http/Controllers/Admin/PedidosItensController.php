<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PedidosItem\BulkDestroyPedidosItem;
use App\Http\Requests\Admin\PedidosItem\DestroyPedidosItem;
use App\Http\Requests\Admin\PedidosItem\IndexPedidosItem;
use App\Http\Requests\Admin\PedidosItem\StorePedidosItem;
use App\Http\Requests\Admin\PedidosItem\UpdatePedidosItem;
use App\Models\PedidosItem;
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

class PedidosItensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPedidosItem $request
     * @return array|Factory|View
     */
    public function index(IndexPedidosItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PedidosItem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'pedido_id', 'numero_sequencial', 'produto_id', 'quantidade', 'preco_unitario', 'observacao_id'],

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

        return view('admin.pedidos-item.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pedidos-item.create');

        return view('admin.pedidos-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePedidosItem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePedidosItem $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PedidosItem
        $pedidosItem = PedidosItem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos-itens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos-itens');
    }

    /**
     * Display the specified resource.
     *
     * @param PedidosItem $pedidosItem
     * @throws AuthorizationException
     * @return void
     */
    public function show(PedidosItem $pedidosItem)
    {
        $this->authorize('admin.pedidos-item.show', $pedidosItem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PedidosItem $pedidosItem
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PedidosItem $pedidosItem)
    {
        $this->authorize('admin.pedidos-item.edit', $pedidosItem);


        return view('admin.pedidos-item.edit', [
            'pedidosItem' => $pedidosItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePedidosItem $request
     * @param PedidosItem $pedidosItem
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePedidosItem $request, PedidosItem $pedidosItem)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PedidosItem
        $pedidosItem->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pedidos-itens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pedidos-itens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPedidosItem $request
     * @param PedidosItem $pedidosItem
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPedidosItem $request, PedidosItem $pedidosItem)
    {
        $pedidosItem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPedidosItem $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPedidosItem $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PedidosItem::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
