<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PedidosDesconto\BulkDestroyPedidosDesconto;
use App\Http\Requests\Admin\PedidosDesconto\DestroyPedidosDesconto;
use App\Http\Requests\Admin\PedidosDesconto\IndexPedidosDesconto;
use App\Http\Requests\Admin\PedidosDesconto\StorePedidosDesconto;
use App\Http\Requests\Admin\PedidosDesconto\UpdatePedidosDesconto;
use App\Models\PedidosDesconto;
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

class PedidosDescontosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPedidosDesconto $request
     * @return array|Factory|View
     */
    public function index(IndexPedidosDesconto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PedidosDesconto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'pedido_id', 'pedidos_item_id', 'desconto', 'unidade_desconto', 'valor_desconto'],

            // set columns to searchIn
            ['id', 'unidade_desconto']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.pedidos-desconto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pedidos-desconto.create');

        return view('admin.pedidos-desconto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePedidosDesconto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePedidosDesconto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PedidosDesconto
        $pedidosDesconto = PedidosDesconto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos-descontos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos-descontos');
    }

    /**
     * Display the specified resource.
     *
     * @param PedidosDesconto $pedidosDesconto
     * @throws AuthorizationException
     * @return void
     */
    public function show(PedidosDesconto $pedidosDesconto)
    {
        $this->authorize('admin.pedidos-desconto.show', $pedidosDesconto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PedidosDesconto $pedidosDesconto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PedidosDesconto $pedidosDesconto)
    {
        $this->authorize('admin.pedidos-desconto.edit', $pedidosDesconto);


        return view('admin.pedidos-desconto.edit', [
            'pedidosDesconto' => $pedidosDesconto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePedidosDesconto $request
     * @param PedidosDesconto $pedidosDesconto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePedidosDesconto $request, PedidosDesconto $pedidosDesconto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PedidosDesconto
        $pedidosDesconto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pedidos-descontos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pedidos-descontos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPedidosDesconto $request
     * @param PedidosDesconto $pedidosDesconto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPedidosDesconto $request, PedidosDesconto $pedidosDesconto)
    {
        $pedidosDesconto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPedidosDesconto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPedidosDesconto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PedidosDesconto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
