<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pedido\BulkDestroyPedido;
use App\Http\Requests\Admin\Pedido\DestroyPedido;
use App\Http\Requests\Admin\Pedido\IndexPedido;
use App\Http\Requests\Admin\Pedido\StorePedido;
use App\Http\Requests\Admin\Pedido\UpdatePedido;
use App\Models\Pedido;
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

class PedidosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPedido $request
     * @return array|Factory|View
     */
    public function index(IndexPedido $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Pedido::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'cliente_id', 'canais_venda_id', 'data_confirmacao_pedido', 'data_entrega_prevista', 'data_entrega_realizada', 'forma_pagto_entrada_id', 'data_limite_entrada', 'porcentagem_entrada', 'data_pedido', 'valor_entrada', 'data_pagto_entrada', 'forma_pagto_restante_id', 'data_restante', 'valor_restante', 'observacao_id', 'endereco_entrega_id'],

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

        return view('admin.pedido.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pedido.create');

        return view('admin.pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePedido $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePedido $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Pedido
        $pedido = Pedido::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param Pedido $pedido
     * @throws AuthorizationException
     * @return void
     */
    public function show(Pedido $pedido)
    {
        $this->authorize('admin.pedido.show', $pedido);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pedido $pedido
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Pedido $pedido)
    {
        $this->authorize('admin.pedido.edit', $pedido);


        return view('admin.pedido.edit', [
            'pedido' => $pedido,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePedido $request
     * @param Pedido $pedido
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePedido $request, Pedido $pedido)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Pedido
        $pedido->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pedidos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPedido $request
     * @param Pedido $pedido
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPedido $request, Pedido $pedido)
    {
        $pedido->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPedido $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPedido $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Pedido::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
