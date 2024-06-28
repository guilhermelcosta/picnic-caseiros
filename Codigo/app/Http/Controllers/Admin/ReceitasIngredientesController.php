<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReceitasIngrediente\BulkDestroyReceitasIngrediente;
use App\Http\Requests\Admin\ReceitasIngrediente\DestroyReceitasIngrediente;
use App\Http\Requests\Admin\ReceitasIngrediente\IndexReceitasIngrediente;
use App\Http\Requests\Admin\ReceitasIngrediente\StoreReceitasIngrediente;
use App\Http\Requests\Admin\ReceitasIngrediente\UpdateReceitasIngrediente;
use App\Models\ReceitasIngrediente;
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

class ReceitasIngredientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReceitasIngrediente $request
     * @return array|Factory|View
     */
    public function index(IndexReceitasIngrediente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ReceitasIngrediente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'receita_id', 'insumo_id', 'quantidade', 'unidade'],

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

        return view('admin.receitas-ingrediente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.receitas-ingrediente.create');

        return view('admin.receitas-ingrediente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReceitasIngrediente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReceitasIngrediente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ReceitasIngrediente
        $receitasIngrediente = ReceitasIngrediente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/receitas-ingredientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/receitas-ingredientes');
    }

    /**
     * Display the specified resource.
     *
     * @param ReceitasIngrediente $receitasIngrediente
     * @throws AuthorizationException
     * @return void
     */
    public function show(ReceitasIngrediente $receitasIngrediente)
    {
        $this->authorize('admin.receitas-ingrediente.show', $receitasIngrediente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ReceitasIngrediente $receitasIngrediente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ReceitasIngrediente $receitasIngrediente)
    {
        $this->authorize('admin.receitas-ingrediente.edit', $receitasIngrediente);


        return view('admin.receitas-ingrediente.edit', [
            'receitasIngrediente' => $receitasIngrediente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReceitasIngrediente $request
     * @param ReceitasIngrediente $receitasIngrediente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReceitasIngrediente $request, ReceitasIngrediente $receitasIngrediente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ReceitasIngrediente
        $receitasIngrediente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/receitas-ingredientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/receitas-ingredientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReceitasIngrediente $request
     * @param ReceitasIngrediente $receitasIngrediente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReceitasIngrediente $request, ReceitasIngrediente $receitasIngrediente)
    {
        $receitasIngrediente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReceitasIngrediente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReceitasIngrediente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ReceitasIngrediente::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
