<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Produto\BulkDestroyProduto;
use App\Http\Requests\Admin\Produto\DestroyProduto;
use App\Http\Requests\Admin\Produto\IndexProduto;
use App\Http\Requests\Admin\Produto\StoreProduto;
use App\Http\Requests\Admin\Produto\UpdateProduto;
use App\Models\Insumo;
use App\Models\Produto;
use App\Models\ProdutosItem;
use App\Models\Receita;
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

class ProdutosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProduto $request
     * @return array|Factory|View
     */
    public function index(IndexProduto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Produto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'descricao', 'observacao_id', 'estoque'],

            // set columns to searchIn
            ['id', 'nome', 'descricao'],

            function ($query) {
                $query->with('observacao', 'insumos', 'receitas');
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.produto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.produto.create');

        $receitas = Receita::get();
        $insumos = Insumo::where('is_ativo', true)->get();
        $tipos_item = $receitas->concat($insumos)->sortBy('descricao')->values();

        return view('admin.produto.create', [
            'tipos_item' => $tipos_item,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProduto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProduto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        DB::transaction(static function () use ($sanitized) {
            // Store the Produto
            $produto = Produto::create($sanitized);

            foreach ($sanitized['itens'] as $item) {
                $itemProduto = [
                    'produto_id' => $produto->id,
                    'receita_id' => null,
                    'insumo_id' => null,
                    'quantidade' => $item['quantidade'],
                    'porcentagem_mao_obra' => $item['porcentagem_mao_obra'],
                    'porcentagem_lucro' => $item['porcentagem_lucro'],
                    'unidade' => 9,
                ];
                if (strpos($item['item']['resource_url'], '/receitas/')) {
                    $itemProduto['receita_id'] = $item['item']['id'];
                }
                if (strpos($item['item']['resource_url'], '/insumos/')) {
                    $itemProduto['insumo_id'] = $item['item']['id'];
                }
                $itemProduto = ProdutosItem::create($itemProduto);
            }
        });

        if ($request->ajax()) {
            return ['redirect' => url('admin/produtos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param Produto $produto
     * @throws AuthorizationException
     * @return void
     */
    public function show(Produto $produto)
    {
        $this->authorize('admin.produto.show', $produto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Produto $produto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Produto $produto)
    {
        $this->authorize('admin.produto.edit', $produto);

        $receitas = Receita::get();
        $insumos = Insumo::where('is_ativo', true)->get();
        $tipos_item = $receitas->concat($insumos)->sortBy('descricao')->values();

        $observacao = $produto->observacao;
        $itens = $produto->itens;

        $produto = $produto->toArray();

        if (!$observacao) {
            $produto['observacao'] = [
                'observacao' => null,
            ];
        }

        if ($itens->isEmpty()) {
            $produto['itens'] = [
                'quantidade' => '',
                'item' => '',
                'porcentagem_mao_obra' => '',
                'porcentagem_lucro' => ''
            ];
        } else {
            $itens = array_map(function($value) {
                if ($value['receita_id']) {
                    $value['item'] = Receita::where('id', $value['receita_id'])->first();
                }
                if ($value['insumo_id']) {
                    $value['item'] = Insumo::where('id', $value['insumo_id'])->first();
                }
                return $value;
            }, $itens->toArray());
            $produto['itens'] = $itens;
        }

        return view('admin.produto.edit', [
            'produto' => $produto,
            'tipos_item' => $tipos_item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProduto $request
     * @param Produto $produto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProduto $request, Produto $produto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Produto
        DB::transaction(static function () use ($sanitized, $produto) {
            $produto->update($sanitized);

            $ingredientes_banco = ProdutosItem::where('produto_id', $produto->id)->delete();

            foreach ($sanitized['itens'] as $item) {
                $itemProduto = [
                    'produto_id' => $produto->id,
                    'receita_id' => null,
                    'insumo_id' => null,
                    'quantidade' => $item['quantidade'],
                    'porcentagem_mao_obra' => $item['porcentagem_mao_obra'],
                    'porcentagem_lucro' => $item['porcentagem_lucro'],
                    'unidade' => 9,
                ];
                if (strpos($item['item']['resource_url'], '/receitas/')) {
                    $itemProduto['receita_id'] = $item['item']['id'];
                }
                if (strpos($item['item']['resource_url'], '/insumos/')) {
                    $itemProduto['insumo_id'] = $item['item']['id'];
                }
                $itemProduto = ProdutosItem::create($itemProduto);
            }
        });

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/produtos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProduto $request
     * @param Produto $produto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProduto $request, Produto $produto)
    {
        $produto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProduto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProduto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Produto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
