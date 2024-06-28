<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormasPagamento\BulkDestroyFormasPagamento;
use App\Http\Requests\Admin\FormasPagamento\DestroyFormasPagamento;
use App\Http\Requests\Admin\FormasPagamento\IndexFormasPagamento;
use App\Http\Requests\Admin\FormasPagamento\StoreFormasPagamento;
use App\Http\Requests\Admin\FormasPagamento\UpdateFormasPagamento;
use App\Models\FormasPagamento;
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

class FormasPagamentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFormasPagamento $request
     * @return array|Factory|View
     */
    public function index(IndexFormasPagamento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(FormasPagamento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'descricao', 'is_ativo'],

            // set columns to searchIn
            ['id', 'descricao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.formas-pagamento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.formas-pagamento.create');

        return view('admin.formas-pagamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFormasPagamento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFormasPagamento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the FormasPagamento
        $formasPagamento = FormasPagamento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/formas-pagamentos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/formas-pagamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param FormasPagamento $formasPagamento
     * @throws AuthorizationException
     * @return void
     */
    public function show(FormasPagamento $formasPagamento)
    {
        $this->authorize('admin.formas-pagamento.show', $formasPagamento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FormasPagamento $formasPagamento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(FormasPagamento $formasPagamento)
    {
        $this->authorize('admin.formas-pagamento.edit', $formasPagamento);


        return view('admin.formas-pagamento.edit', [
            'formasPagamento' => $formasPagamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFormasPagamento $request
     * @param FormasPagamento $formasPagamento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFormasPagamento $request, FormasPagamento $formasPagamento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values FormasPagamento
        $formasPagamento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/formas-pagamentos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/formas-pagamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFormasPagamento $request
     * @param FormasPagamento $formasPagamento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFormasPagamento $request, FormasPagamento $formasPagamento)
    {
        $formasPagamento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFormasPagamento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFormasPagamento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    FormasPagamento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
