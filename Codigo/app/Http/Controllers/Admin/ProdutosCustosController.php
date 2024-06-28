<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutosCusto\BulkDestroyProdutosCusto;
use App\Http\Requests\Admin\ProdutosCusto\DestroyProdutosCusto;
use App\Http\Requests\Admin\ProdutosCusto\IndexProdutosCusto;
use App\Http\Requests\Admin\ProdutosCusto\StoreProdutosCusto;
use App\Http\Requests\Admin\ProdutosCusto\UpdateProdutosCusto;
use App\Models\CanaisVenda;
use App\Models\Insumo;
use App\Models\Produto;
use App\Models\ProdutosCusto;
use App\Models\Receita;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProdutosCustosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProdutosCusto $request
     * @return array|Factory|View
     */
    public function index(IndexProdutosCusto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ProdutosCusto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'produto_id', 'canais_venda_id', 'inicio_vigencia', 'fim_vigencia', 'valor_custo', 'valor_venda'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.produtos-custo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.produtos-custo.create');

        $produtos = Produto::all();
        $canaisVenda = CanaisVenda::all();

        return view('admin.produtos-custo.create', [
            'produtos' => $produtos,
            'canais_venda' => $canaisVenda,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProdutosCusto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProdutosCusto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['produto_id'] = $sanitized['produto']['id'];
        $sanitized['canais_venda_id'] = $sanitized['canal_venda']['id'];
        $sanitized['inicio_vigencia'] = Carbon::now();

        // Store the ProdutosCusto
        $produtosCusto = ProdutosCusto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/produtos-custos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/produtos-custos');
    }

    /**
     * Display the specified resource.
     *
     * @param ProdutosCusto $produtosCusto
     * @throws AuthorizationException
     * @return void
     */
    public function show(ProdutosCusto $produtosCusto)
    {
        $this->authorize('admin.produtos-custo.show', $produtosCusto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProdutosCusto $produtosCusto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ProdutosCusto $produtosCusto)
    {
        $this->authorize('admin.produtos-custo.edit', $produtosCusto);

        $produtos = Produto::all();
        $canaisVenda = CanaisVenda::all();

        $produto = $produtosCusto->produto;
        $canalVenda = $produtosCusto->canalVenda;

        $produtosCusto = $produtosCusto->toArray();

        if ($produto) {
            $produtosCusto['produto'] = $produto;
        }

        if ($canalVenda) {
            $produtosCusto['canal_venda'] = $canalVenda;
        }

        return view('admin.produtos-custo.edit', [
            'produtos' => $produtos,
            'canais_venda' => $canaisVenda,
            'produtosCusto' => $produtosCusto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProdutosCusto $request
     * @param ProdutosCusto $produtosCusto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProdutosCusto $request, ProdutosCusto $produtosCusto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        if ($sanitized['produto']['id']) {
            $sanitized['produto_id'] = $sanitized['produto']['id'];
        }

        if ($sanitized['canal_venda']['id']) {
            $sanitized['canais_venda_id'] = $sanitized['canal_venda']['id'];
        }

        // Update changed values ProdutosCusto
        $produtosCusto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/produtos-custos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/produtos-custos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProdutosCusto $request
     * @param ProdutosCusto $produtosCusto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProdutosCusto $request, ProdutosCusto $produtosCusto)
    {
        $produtosCusto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProdutosCusto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProdutosCusto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ProdutosCusto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public static function calculaCustos($insumos = [])
    {
        if (!$insumos || empty($insumos)) {
            $insumos = Insumo::whereIn('id', [14, 15, 16, 17, 18, 19, 20])->get();
        }

        $produtosComInsumos = new Collection();
        $produtosComReceitas = new Collection();
        $receitasComInsumos = new Collection();
        foreach ($insumos as $insumo) {
            $produtosComInsumos = $produtosComInsumos->merge($insumo->produtos)->unique('id');
            $receitasComInsumos = $receitasComInsumos->merge($insumo->receitas)->unique('id');
        }
        $receitaIds = $receitasComInsumos->pluck('id');

        $receitas = Receita::with('ingredientes')->whereIn('id', $receitaIds)->get();

        $receitasCustos = [];
        foreach ($receitas as $receita) {
            $produtosComReceitas = $produtosComReceitas->merge($receita->produtos)->unique('id');
            $receitasCustos[$receita->id] = 0;
            foreach ($receita->ingredientes as $insumo) {
                $custo = $insumo->calculaCusto();
                $receitasCustos[$receita->id] += $custo;
            }
            $receitasCustos[$receita->id] /= $receita->rendimento;
        }

        $produtosComInsumosEReceitas = $produtosComInsumos->merge($produtosComReceitas)->unique('id');
        $produtoIds = $produtosComInsumosEReceitas->pluck('id');
        $produtos = Produto::with('insumos', 'receitas')->whereIn('id', $produtoIds)->get();

        $produtosCustos = [];
        foreach ($produtos as $produto) {
            $produtosCustos[$produto->id] = 0;
            foreach ($produto->insumos as $insumo) {
                $custo = $insumo->calculaCusto();
                if ($custo && is_numeric($produtosCustos[$produto->id])) {
                    $produtosCustos[$produto->id] += $custo;
                } else {
                    $produtosCustos[$produto->id] = null;
                }
            }
            foreach ($produto->receitas as $receita) {
                if (!$receitaIds->contains($receita->id)) {
                    $receitasCustos[$receita->id] = 0;
                    foreach ($receita->ingredientes as $insumo) {
                        $custo = $insumo->calculaCusto();
                        if ($custo && is_numeric($receitasCustos[$receita->id])) {
                            $receitasCustos[$receita->id] += $custo;
                        } else {
                            $receitasCustos[$receita->id] = null;
                        }
                    }
                    $receitasCustos[$receita->id] /= $receita->rendimento;
                    $receitaIds = $receitaIds->merge($receita->id);
                }
                if ($receitasCustos[$receita->id]) {
                    $custo = $receitasCustos[$receita->id];
                    $maoDeObra = $custo * ($receita->pivot->porcentagem_mao_obra / 100);
                    $lucro = $custo * ($receita->pivot->porcentagem_lucro / 100);
                    $produtosCustos[$produto->id] += ($custo + $maoDeObra + $lucro);
                } else {
                    $produtosCustos[$produto->id] = null;
                }
            }
        }
        dd($produtoIds, $receitaIds, $produtosCustos, $receitasCustos);
    }

    public static function calculaCusto($produtoId)
    {
        $produto = Produto::with('insumos', 'receitas')->where('id', $produtoId)->first();

        $produtoCusto = 0;
        $receitaIds = new Collection();
        $receitasCustos = new Collection();
        foreach ($produto->insumos as $insumo) {
            $custo = $insumo->calculaCusto();
            if ($custo && is_numeric($produtoCusto)) {
                $produtoCusto += $custo;
            } else {
                $produtoCusto = null;
            }
        }
        foreach ($produto->receitas as $receita) {
            if (!$receitaIds->contains($receita->id)) {
                $receitasCustos[$receita->id] = 0;
                foreach ($receita->ingredientes as $insumo) {
                    $custo = $insumo->calculaCusto();
                    if ($custo && is_numeric($receitasCustos[$receita->id])) {
                        $receitasCustos[$receita->id] += $custo;
                    } else {
                        $receitasCustos[$receita->id] = null;
                    }
                }
                $receitasCustos[$receita->id] /= $receita->rendimento;
                $receitaIds = $receitaIds->merge($receita->id);
            }
            if ($receitasCustos[$receita->id]) {
                $custo = $receitasCustos[$receita->id];
                $maoDeObra = $custo * ($receita->pivot->porcentagem_mao_obra / 100);
                $lucro = $custo * ($receita->pivot->porcentagem_lucro / 100);
                $produtoCusto += ($custo + $maoDeObra + $lucro);
            } else {
                $produtoCusto = null;
            }
        }
        return $produtoCusto;
    }
}
