<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return Hash::make('picnic');
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('logradouros-tipos')->name('logradouros-tipos/')->group(static function() {
            Route::get('/',                                             'LogradourosTiposController@index')->name('index');
            Route::get('/create',                                       'LogradourosTiposController@create')->name('create');
            Route::post('/',                                            'LogradourosTiposController@store')->name('store');
            Route::get('/{logradourosTipo}/edit',                       'LogradourosTiposController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LogradourosTiposController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{logradourosTipo}',                           'LogradourosTiposController@update')->name('update');
            Route::delete('/{logradourosTipo}',                         'LogradourosTiposController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('observacoes')->name('observacoes/')->group(static function() {
            Route::get('/',                                             'ObservacoesController@index')->name('index');
            Route::get('/create',                                       'ObservacoesController@create')->name('create');
            Route::post('/',                                            'ObservacoesController@store')->name('store');
            Route::get('/{observacao}/edit',                            'ObservacoesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ObservacoesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{observacao}',                                'ObservacoesController@update')->name('update');
            Route::delete('/{observacao}',                              'ObservacoesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('insumos-marcas')->name('insumos-marcas/')->group(static function() {
            Route::get('/',                                             'InsumosMarcasController@index')->name('index');
            Route::get('/create',                                       'InsumosMarcasController@create')->name('create');
            Route::post('/',                                            'InsumosMarcasController@store')->name('store');
            Route::get('/{insumosMarca}/edit',                          'InsumosMarcasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'InsumosMarcasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{insumosMarca}',                              'InsumosMarcasController@update')->name('update');
            Route::delete('/{insumosMarca}',                            'InsumosMarcasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('canais-vendas')->name('canais-vendas/')->group(static function() {
            Route::get('/',                                             'CanaisVendasController@index')->name('index');
            Route::get('/create',                                       'CanaisVendasController@create')->name('create');
            Route::post('/',                                            'CanaisVendasController@store')->name('store');
            Route::get('/{canaisVenda}/edit',                           'CanaisVendasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CanaisVendasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{canaisVenda}',                               'CanaisVendasController@update')->name('update');
            Route::delete('/{canaisVenda}',                             'CanaisVendasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('incentivos-vendas')->name('incentivos-vendas/')->group(static function() {
            Route::get('/',                                             'IncentivosVendasController@index')->name('index');
            Route::get('/create',                                       'IncentivosVendasController@create')->name('create');
            Route::post('/',                                            'IncentivosVendasController@store')->name('store');
            Route::get('/{incentivosVenda}/edit',                       'IncentivosVendasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'IncentivosVendasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{incentivosVenda}',                           'IncentivosVendasController@update')->name('update');
            Route::delete('/{incentivosVenda}',                         'IncentivosVendasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('documentos-tipos')->name('documentos-tipos/')->group(static function() {
            Route::get('/',                                             'DocumentosTiposController@index')->name('index');
            Route::get('/create',                                       'DocumentosTiposController@create')->name('create');
            Route::post('/',                                            'DocumentosTiposController@store')->name('store');
            Route::get('/{documentosTipo}/edit',                        'DocumentosTiposController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DocumentosTiposController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{documentosTipo}',                            'DocumentosTiposController@update')->name('update');
            Route::delete('/{documentosTipo}',                          'DocumentosTiposController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('contatos-tipos')->name('contatos-tipos/')->group(static function() {
            Route::get('/',                                             'ContatosTiposController@index')->name('index');
            Route::get('/create',                                       'ContatosTiposController@create')->name('create');
            Route::post('/',                                            'ContatosTiposController@store')->name('store');
            Route::get('/{contatosTipo}/edit',                          'ContatosTiposController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContatosTiposController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contatosTipo}',                              'ContatosTiposController@update')->name('update');
            Route::delete('/{contatosTipo}',                            'ContatosTiposController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('formas-pagamentos')->name('formas-pagamentos/')->group(static function() {
            Route::get('/',                                             'FormasPagamentosController@index')->name('index');
            Route::get('/create',                                       'FormasPagamentosController@create')->name('create');
            Route::post('/',                                            'FormasPagamentosController@store')->name('store');
            Route::get('/{formasPagamento}/edit',                       'FormasPagamentosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FormasPagamentosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{formasPagamento}',                           'FormasPagamentosController@update')->name('update');
            Route::delete('/{formasPagamento}',                         'FormasPagamentosController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
// Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
//     Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
//         Route::prefix('enderecos')->name('enderecos/')->group(static function() {
//             Route::get('/',                                             'EnderecosController@index')->name('index');
//             Route::get('/create',                                       'EnderecosController@create')->name('create');
//             Route::post('/',                                            'EnderecosController@store')->name('store');
//             Route::get('/{endereco}/edit',                              'EnderecosController@edit')->name('edit');
//             Route::post('/bulk-destroy',                                'EnderecosController@bulkDestroy')->name('bulk-destroy');
//             Route::post('/{endereco}',                                  'EnderecosController@update')->name('update');
//             Route::delete('/{endereco}',                                'EnderecosController@destroy')->name('destroy');
//         });
//     });
// });

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('insumos')->name('insumos/')->group(static function() {
            Route::get('/',                                             'InsumosController@index')->name('index');
            Route::get('/create',                                       'InsumosController@create')->name('create');
            Route::get('/custos/{insumo}',                              'InsumosController@custosIndex')->name('custos-index');
            Route::post('/',                                            'InsumosController@store')->name('store');
            Route::get('/{insumo}/edit',                                'InsumosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'InsumosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{insumo}',                                    'InsumosController@update')->name('update');
            Route::delete('/{insumo}',                                  'InsumosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('receitas')->name('receitas/')->group(static function() {
            Route::get('/',                                             'ReceitasController@index')->name('index');
            Route::get('/create',                                       'ReceitasController@create')->name('create');
            Route::post('/',                                            'ReceitasController@store')->name('store');
            Route::get('/{receita}/edit',                              'ReceitasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReceitasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{receita}',                                  'ReceitasController@update')->name('update');
            Route::delete('/{receita}',                                'ReceitasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('produtos')->name('produtos/')->group(static function() {
            Route::get('/',                                             'ProdutosController@index')->name('index');
            Route::get('/create',                                       'ProdutosController@create')->name('create');
            Route::post('/',                                            'ProdutosController@store')->name('store');
            Route::get('/{produto}/edit',                               'ProdutosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProdutosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{produto}',                                   'ProdutosController@update')->name('update');
            Route::delete('/{produto}',                                 'ProdutosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('fornecedores')->name('fornecedores/')->group(static function() {
            Route::get('/',                                             'FornecedoresController@index')->name('index');
            Route::get('/create',                                       'FornecedoresController@create')->name('create');
            Route::post('/',                                            'FornecedoresController@store')->name('store');
            Route::get('/{fornecedor}/edit',                           'FornecedoresController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FornecedoresController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{fornecedor}',                               'FornecedoresController@update')->name('update');
            Route::delete('/{fornecedor}',                             'FornecedoresController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('receitas-ingredientes')->name('receitas-ingredientes/')->group(static function() {
            Route::get('/',                                             'ReceitasIngredientesController@index')->name('index');
            Route::get('/create',                                       'ReceitasIngredientesController@create')->name('create');
            Route::post('/',                                            'ReceitasIngredientesController@store')->name('store');
            Route::get('/{receitasIngrediente}/edit',                   'ReceitasIngredientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReceitasIngredientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{receitasIngrediente}',                       'ReceitasIngredientesController@update')->name('update');
            Route::delete('/{receitasIngrediente}',                     'ReceitasIngredientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('produtos-itens')->name('produtos-itens/')->group(static function() {
            Route::get('/',                                             'ProdutosItensController@index')->name('index');
            Route::get('/create',                                       'ProdutosItensController@create')->name('create');
            Route::post('/',                                            'ProdutosItensController@store')->name('store');
            Route::get('/{produtosItem}/edit',                          'ProdutosItensController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProdutosItensController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{produtosItem}',                              'ProdutosItensController@update')->name('update');
            Route::delete('/{produtosItem}',                            'ProdutosItensController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClientesController@index')->name('index');
            Route::get('/create',                                       'ClientesController@create')->name('create');
            Route::post('/',                                            'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClientesController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('produtos-custos')->name('produtos-custos/')->group(static function() {
            Route::get('/',                                             'ProdutosCustosController@index')->name('index');
            Route::get('/create',                                       'ProdutosCustosController@create')->name('create');
            Route::post('/',                                            'ProdutosCustosController@store')->name('store');
            Route::get('/{produtosCusto}/edit',                         'ProdutosCustosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProdutosCustosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{produtosCusto}',                             'ProdutosCustosController@update')->name('update');
            Route::delete('/{produtosCusto}',                           'ProdutosCustosController@destroy')->name('destroy');
            Route::get('/calcula-custo',                                'ProdutosCustosController@calculaCustos')->name('custos');
            Route::get('/calcula-custo/{produtoId}',                    'ProdutosCustosController@calculaCusto')->name('custo');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('insumos-custos')->name('insumos-custos/')->group(static function() {
            Route::get('/',                                             'InsumosCustosController@index')->name('index');
            Route::get('/create',                                       'InsumosCustosController@create')->name('create');
            Route::post('/',                                            'InsumosCustosController@store')->name('store');
            Route::get('/{insumosCusto}/edit',                          'InsumosCustosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'InsumosCustosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{insumosCusto}',                              'InsumosCustosController@update')->name('update');
            Route::delete('/{insumosCusto}',                            'InsumosCustosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('produtos-custos-incentivos-vendas')->name('produtos-custos-incentivos-vendas/')->group(static function() {
            Route::get('/',                                             'ProdutosCustosIncentivosVendasController@index')->name('index');
            Route::get('/create',                                       'ProdutosCustosIncentivosVendasController@create')->name('create');
            Route::post('/',                                            'ProdutosCustosIncentivosVendasController@store')->name('store');
            Route::get('/{produtosCustosIncentivosVenda}/edit',         'ProdutosCustosIncentivosVendasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProdutosCustosIncentivosVendasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{produtosCustosIncentivosVenda}',             'ProdutosCustosIncentivosVendasController@update')->name('update');
            Route::delete('/{produtosCustosIncentivosVenda}',           'ProdutosCustosIncentivosVendasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('contatos')->name('contatos/')->group(static function() {
            Route::get('/',                                             'ContatosController@index')->name('index');
            Route::get('/create',                                       'ContatosController@create')->name('create');
            Route::post('/',                                            'ContatosController@store')->name('store');
            Route::get('/{contato}/edit',                               'ContatosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContatosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contato}',                                   'ContatosController@update')->name('update');
            Route::delete('/{contato}',                                 'ContatosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos')->name('pedidos/')->group(static function() {
            Route::get('/',                                             'PedidosController@index')->name('index');
            Route::get('/create',                                       'PedidosController@create')->name('create');
            Route::post('/',                                            'PedidosController@store')->name('store');
            Route::get('/{pedido}/edit',                                'PedidosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedido}',                                    'PedidosController@update')->name('update');
            Route::delete('/{pedido}',                                  'PedidosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos-itens')->name('pedidos-itens/')->group(static function() {
            Route::get('/',                                             'PedidosItensController@index')->name('index');
            Route::get('/create',                                       'PedidosItensController@create')->name('create');
            Route::post('/',                                            'PedidosItensController@store')->name('store');
            Route::get('/{pedidosItem}/edit',                           'PedidosItensController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosItensController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedidosItem}',                               'PedidosItensController@update')->name('update');
            Route::delete('/{pedidosItem}',                             'PedidosItensController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos-descontos')->name('pedidos-descontos/')->group(static function() {
            Route::get('/',                                             'PedidosDescontosController@index')->name('index');
            Route::get('/create',                                       'PedidosDescontosController@create')->name('create');
            Route::post('/',                                            'PedidosDescontosController@store')->name('store');
            Route::get('/{pedidosDesconto}/edit',                       'PedidosDescontosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosDescontosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedidosDesconto}',                           'PedidosDescontosController@update')->name('update');
            Route::delete('/{pedidosDesconto}',                         'PedidosDescontosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos-cancelamentos')->name('pedidos-cancelamentos/')->group(static function() {
            Route::get('/',                                             'PedidosCancelamentosController@index')->name('index');
            Route::get('/create',                                       'PedidosCancelamentosController@create')->name('create');
            Route::post('/',                                            'PedidosCancelamentosController@store')->name('store');
            Route::get('/{pedidosCancelamento}/edit',                   'PedidosCancelamentosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosCancelamentosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedidosCancelamento}',                       'PedidosCancelamentosController@update')->name('update');
            Route::delete('/{pedidosCancelamento}',                     'PedidosCancelamentosController@destroy')->name('destroy');
        });
    });
});
