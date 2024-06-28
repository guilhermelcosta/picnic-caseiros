<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LogradourosTipo\BulkDestroyLogradourosTipo;
use App\Http\Requests\Admin\LogradourosTipo\DestroyLogradourosTipo;
use App\Http\Requests\Admin\LogradourosTipo\IndexLogradourosTipo;
use App\Http\Requests\Admin\LogradourosTipo\StoreLogradourosTipo;
use App\Http\Requests\Admin\LogradourosTipo\UpdateLogradourosTipo;
use App\Models\LogradourosTipo;
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

class LogradourosTiposController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLogradourosTipo $request
     * @return array|Factory|View
     */
    public function index(IndexLogradourosTipo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LogradourosTipo::class)->processRequestAndGet(
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

        return view('admin.logradouros-tipo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.logradouros-tipo.create');

        return view('admin.logradouros-tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLogradourosTipo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLogradourosTipo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LogradourosTipo
        $logradourosTipo = LogradourosTipo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/logradouros-tipos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/logradouros-tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param LogradourosTipo $logradourosTipo
     * @throws AuthorizationException
     * @return void
     */
    public function show(LogradourosTipo $logradourosTipo)
    {
        $this->authorize('admin.logradouros-tipo.show', $logradourosTipo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LogradourosTipo $logradourosTipo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LogradourosTipo $logradourosTipo)
    {
        $this->authorize('admin.logradouros-tipo.edit', $logradourosTipo);


        return view('admin.logradouros-tipo.edit', [
            'logradourosTipo' => $logradourosTipo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLogradourosTipo $request
     * @param LogradourosTipo $logradourosTipo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLogradourosTipo $request, LogradourosTipo $logradourosTipo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LogradourosTipo
        $logradourosTipo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/logradouros-tipos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/logradouros-tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLogradourosTipo $request
     * @param LogradourosTipo $logradourosTipo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLogradourosTipo $request, LogradourosTipo $logradourosTipo)
    {
        $logradourosTipo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLogradourosTipo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLogradourosTipo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LogradourosTipo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
