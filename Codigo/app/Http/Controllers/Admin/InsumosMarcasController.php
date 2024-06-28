<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InsumosMarca\BulkDestroyInsumosMarca;
use App\Http\Requests\Admin\InsumosMarca\DestroyInsumosMarca;
use App\Http\Requests\Admin\InsumosMarca\IndexInsumosMarca;
use App\Http\Requests\Admin\InsumosMarca\StoreInsumosMarca;
use App\Http\Requests\Admin\InsumosMarca\UpdateInsumosMarca;
use App\Models\InsumosMarca;
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

class InsumosMarcasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexInsumosMarca $requestz
     * @return array|Factory|View
     */
    public function index(IndexInsumosMarca $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(InsumosMarca::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'is_ativo'],

            // set columns to searchIn
            ['id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.insumos-marca.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.insumos-marca.create');

        return view('admin.insumos-marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInsumosMarca $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreInsumosMarca $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the InsumosMarca
        $insumosMarca = InsumosMarca::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/insumos-marcas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/insumos-marcas');
    }

    /**
     * Display the specified resource.
     *
     * @param InsumosMarca $insumosMarca
     * @throws AuthorizationException
     * @return void
     */
    public function show(InsumosMarca $insumosMarca)
    {
        $this->authorize('admin.insumos-marca.show', $insumosMarca);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InsumosMarca $insumosMarca
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(InsumosMarca $insumosMarca)
    {
        $this->authorize('admin.insumos-marca.edit', $insumosMarca);


        return view('admin.insumos-marca.edit', [
            'insumosMarca' => $insumosMarca,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInsumosMarca $request
     * @param InsumosMarca $insumosMarca
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateInsumosMarca $request, InsumosMarca $insumosMarca)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values InsumosMarca
        $insumosMarca->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/insumos-marcas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/insumos-marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyInsumosMarca $request
     * @param InsumosMarca $insumosMarca
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyInsumosMarca $request, InsumosMarca $insumosMarca)
    {
        $insumosMarca->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyInsumosMarca $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyInsumosMarca $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    InsumosMarca::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
