<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PedidosCancelamento\BulkDestroyPedidosCancelamento;
use App\Http\Requests\Admin\PedidosCancelamento\DestroyPedidosCancelamento;
use App\Http\Requests\Admin\PedidosCancelamento\IndexPedidosCancelamento;
use App\Http\Requests\Admin\PedidosCancelamento\StorePedidosCancelamento;
use App\Http\Requests\Admin\PedidosCancelamento\UpdatePedidosCancelamento;
use App\Models\PedidosCancelamento;
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

class PedidosCancelamentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPedidosCancelamento $request
     * @return array|Factory|View
     */
    public function index(IndexPedidosCancelamento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PedidosCancelamento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'pedido_id', 'pedidos_item_id', 'data_solicitacao', 'taxa_cancelamento', 'unidade', 'valor_cancelamento', 'valor_reembolso', 'data_reembolso'],

            // set columns to searchIn
            ['id', 'unidade']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.pedidos-cancelamento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pedidos-cancelamento.create');

        return view('admin.pedidos-cancelamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePedidosCancelamento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePedidosCancelamento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PedidosCancelamento
        $pedidosCancelamento = PedidosCancelamento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos-cancelamentos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos-cancelamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param PedidosCancelamento $pedidosCancelamento
     * @throws AuthorizationException
     * @return void
     */
    public function show(PedidosCancelamento $pedidosCancelamento)
    {
        $this->authorize('admin.pedidos-cancelamento.show', $pedidosCancelamento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PedidosCancelamento $pedidosCancelamento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PedidosCancelamento $pedidosCancelamento)
    {
        $this->authorize('admin.pedidos-cancelamento.edit', $pedidosCancelamento);


        return view('admin.pedidos-cancelamento.edit', [
            'pedidosCancelamento' => $pedidosCancelamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePedidosCancelamento $request
     * @param PedidosCancelamento $pedidosCancelamento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePedidosCancelamento $request, PedidosCancelamento $pedidosCancelamento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PedidosCancelamento
        $pedidosCancelamento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pedidos-cancelamentos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pedidos-cancelamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPedidosCancelamento $request
     * @param PedidosCancelamento $pedidosCancelamento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPedidosCancelamento $request, PedidosCancelamento $pedidosCancelamento)
    {
        $pedidosCancelamento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPedidosCancelamento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPedidosCancelamento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PedidosCancelamento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
