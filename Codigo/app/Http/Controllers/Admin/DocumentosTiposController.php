<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DocumentosTipo\BulkDestroyDocumentosTipo;
use App\Http\Requests\Admin\DocumentosTipo\DestroyDocumentosTipo;
use App\Http\Requests\Admin\DocumentosTipo\IndexDocumentosTipo;
use App\Http\Requests\Admin\DocumentosTipo\StoreDocumentosTipo;
use App\Http\Requests\Admin\DocumentosTipo\UpdateDocumentosTipo;
use App\Models\DocumentosTipo;
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

class DocumentosTiposController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDocumentosTipo $request
     * @return array|Factory|View
     */
    public function index(IndexDocumentosTipo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DocumentosTipo::class)->processRequestAndGet(
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

        return view('admin.documentos-tipo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.documentos-tipo.create');

        return view('admin.documentos-tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDocumentosTipo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDocumentosTipo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DocumentosTipo
        $documentosTipo = DocumentosTipo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/documentos-tipos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/documentos-tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param DocumentosTipo $documentosTipo
     * @throws AuthorizationException
     * @return void
     */
    public function show(DocumentosTipo $documentosTipo)
    {
        $this->authorize('admin.documentos-tipo.show', $documentosTipo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DocumentosTipo $documentosTipo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DocumentosTipo $documentosTipo)
    {
        $this->authorize('admin.documentos-tipo.edit', $documentosTipo);


        return view('admin.documentos-tipo.edit', [
            'documentosTipo' => $documentosTipo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDocumentosTipo $request
     * @param DocumentosTipo $documentosTipo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDocumentosTipo $request, DocumentosTipo $documentosTipo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DocumentosTipo
        $documentosTipo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/documentos-tipos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/documentos-tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDocumentosTipo $request
     * @param DocumentosTipo $documentosTipo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDocumentosTipo $request, DocumentosTipo $documentosTipo)
    {
        $documentosTipo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDocumentosTipo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDocumentosTipo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DocumentosTipo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
