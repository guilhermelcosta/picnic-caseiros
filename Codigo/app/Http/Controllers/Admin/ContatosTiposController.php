<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContatosTipo\BulkDestroyContatosTipo;
use App\Http\Requests\Admin\ContatosTipo\DestroyContatosTipo;
use App\Http\Requests\Admin\ContatosTipo\IndexContatosTipo;
use App\Http\Requests\Admin\ContatosTipo\StoreContatosTipo;
use App\Http\Requests\Admin\ContatosTipo\UpdateContatosTipo;
use App\Models\ContatosTipo;
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

class ContatosTiposController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexContatosTipo $request
     * @return array|Factory|View
     */
    public function index(IndexContatosTipo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ContatosTipo::class)->processRequestAndGet(
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

        return view('admin.contatos-tipo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.contatos-tipo.create');

        return view('admin.contatos-tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContatosTipo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreContatosTipo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ContatosTipo
        $contatosTipo = ContatosTipo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contatos-tipos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contatos-tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param ContatosTipo $contatosTipo
     * @throws AuthorizationException
     * @return void
     */
    public function show(ContatosTipo $contatosTipo)
    {
        $this->authorize('admin.contatos-tipo.show', $contatosTipo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContatosTipo $contatosTipo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ContatosTipo $contatosTipo)
    {
        $this->authorize('admin.contatos-tipo.edit', $contatosTipo);


        return view('admin.contatos-tipo.edit', [
            'contatosTipo' => $contatosTipo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContatosTipo $request
     * @param ContatosTipo $contatosTipo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateContatosTipo $request, ContatosTipo $contatosTipo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ContatosTipo
        $contatosTipo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contatos-tipos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contatos-tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyContatosTipo $request
     * @param ContatosTipo $contatosTipo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyContatosTipo $request, ContatosTipo $contatosTipo)
    {
        $contatosTipo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyContatosTipo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyContatosTipo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ContatosTipo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
