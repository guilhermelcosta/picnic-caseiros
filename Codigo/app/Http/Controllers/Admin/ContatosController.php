<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contato\BulkDestroyContato;
use App\Http\Requests\Admin\Contato\DestroyContato;
use App\Http\Requests\Admin\Contato\IndexContato;
use App\Http\Requests\Admin\Contato\StoreContato;
use App\Http\Requests\Admin\Contato\UpdateContato;
use App\Models\Contato;
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

class ContatosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexContato $request
     * @return array|Factory|View
     */
    public function index(IndexContato $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Contato::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'fornecedor_id', 'cliente_id', 'contatos_tipo_id', 'contato'],

            // set columns to searchIn
            ['id', 'contato']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.contato.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.contato.create');

        return view('admin.contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContato $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreContato $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Contato
        $contato = Contato::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contatos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contatos');
    }

    /**
     * Display the specified resource.
     *
     * @param Contato $contato
     * @throws AuthorizationException
     * @return void
     */
    public function show(Contato $contato)
    {
        $this->authorize('admin.contato.show', $contato);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contato $contato
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Contato $contato)
    {
        $this->authorize('admin.contato.edit', $contato);


        return view('admin.contato.edit', [
            'contato' => $contato,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContato $request
     * @param Contato $contato
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateContato $request, Contato $contato)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Contato
        $contato->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contatos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyContato $request
     * @param Contato $contato
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyContato $request, Contato $contato)
    {
        $contato->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyContato $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyContato $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Contato::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
