<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StructEnums\UnidadeMedidaEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Receita\BulkDestroyReceita;
use App\Http\Requests\Admin\Receita\DestroyReceita;
use App\Http\Requests\Admin\Receita\IndexReceita;
use App\Http\Requests\Admin\Receita\StoreReceita;
use App\Http\Requests\Admin\Receita\UpdateReceita;
use App\Models\Insumo;
use App\Models\Receita;
use App\Services\ReceitasService;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ReceitasController extends Controller
{

    private ReceitasService $receitasService;

    public function __construct()
    {
        $this->receitasService = new ReceitasService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexReceita $request
     * @return array|Factory|View
     */
    public function index(IndexReceita $request)
    {
        // create and AdminListing instance for a specific model
        $data = AdminListing::create(Receita::class)->processRequestAndGet(
            // pass the request with params
                $request,

                // set columns to query
                ['id', 'descricao', 'modo_preparo', 'rendimento', 'porcao', 'unidade_porcao', 'preparo_altera_peso', 'percentual_altera_peso', 'observacao_id'],

                // set columns to searchIn
                ['id', 'descricao', 'modo_preparo', 'unidade_porcao'],

                // Adicione a cláusula para filtrar receitas não deletadas
                function ($query) {
                    $query->where('deleted_at', null);
                },

                //DEU ERROOOOOO*******************
                // function ($query) {
                //     $query->with('observacao');
                // }
            );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.receita.index', ['data' => $data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.receita.create');

        $tiposIngrediente = Insumo::where('is_ativo', true)->get();

        return view('admin.receita.create', [
            'tipos_unidade' => UnidadeMedidaEnum::getOptions(),
            'tipos_ingrediente' => $tiposIngrediente,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReceita $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReceita $request)
    {

        $this->receitasService->store($request->getSanitized());

        if ($request->ajax()) {
            return ['redirect' => url('admin/receitas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/receitas');
    }

    /**
     * Display the specified resource.
     *
     * @param Receita $receita
     * @return void
     * @throws AuthorizationException
     */
    public function show(Receita $receita)
    {
        $this->authorize('admin.receita.show', $receita);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Receita $receita
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Receita $receita)
    {
        $this->authorize('admin.receita.edit', $receita);

        $tipos_ingrediente = Insumo::where('is_ativo', true)->get();

        $unidade_porcao = $receita->unidade_porcao;
        $observacao = $receita->observacao;
        $ingredientes = $receita->ingredientes;

        $receita = $receita->toArray();

        if ($unidade_porcao) {
            $receita['unidade_porcao'] = UnidadeMedidaEnum::getOptionByValue($unidade_porcao);
        }

        if (!$observacao) {
            $receita['observacao'] = [
                'observacao' => null,
            ];
        }

        if ($ingredientes->isEmpty()) {
            $receita['ingredientes'] = [
                [
                    'id' => null,
                    'descricao' => null,
                    'unidade' => null,
                    'quantidade' => null,
                    'ingrediente' => null
                ]
            ];
        } else {
            $ingredientes = array_map(function ($value) {
                $value['ingrediente'] = $value;
                $value['unidade'] = UnidadeMedidaEnum::getOptionByValue($value['pivot']['unidade']);
                $value['quantidade'] = $value['pivot']['quantidade'];
                return $value;
            }, $ingredientes->toArray());
            $receita['ingredientes'] = $ingredientes;
        }

        return view('admin.receita.edit', [
            'receita' => $receita,
            'tipos_unidade' => UnidadeMedidaEnum::getOptions(),
            'tipos_ingrediente' => $tipos_ingrediente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReceita $request
     * @param Receita $receita
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReceita $request, Receita $receita)
    {
        $dados = $request->getSanitized();

        $dados['observacao'] = $request['observacao'];
        $dados['observacao_id'] = $request['observacao_id'];
        $dados['ingredientes'] = $request['ingredientes'];
        $dados['unidade_porcao'] = $dados['unidade_porcao']['value'];

        $this->receitasService->update($dados, $receita);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/receitas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/receitas');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReceita $request
     * @param Receita $receita
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyReceita $request, Receita $receita)
    {

        $this->receitasService->destroy($receita);

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReceita $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyReceita $request): Response
    {
        $this->receitasService->bulkDestroy($request);

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
