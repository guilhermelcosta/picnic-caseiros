<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,

    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LogradourosTipo::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Observacao::class, static function (Faker\Generator $faker) {
    return [
        'observacao' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\InsumosMarca::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CanaisVenda::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'comissao' => $faker->randomNumber(5),
        'unidade_comissao' => $faker->sentence,
        'desconto' => $faker->randomNumber(5),
        'unidade_desconto' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\IncentivosVenda::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'valor' => $faker->randomNumber(5),
        'unidade' => $faker->sentence,
        'maximo_moeda' => $faker->randomNumber(5),
        'inicio_vigencia' => $faker->sentence,
        'fim_vigencia' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DocumentosTipo::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ContatosTipo::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\FormasPagamento::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Endereco::class, static function (Faker\Generator $faker) {
    return [
        'logradouros_tipo_id' => $faker->sentence,
        'logradouro' => $faker->sentence,
        'numero' => $faker->randomNumber(5),
        'complemento' => $faker->sentence,
        'bairro' => $faker->sentence,
        'cidade' => $faker->sentence,
        'estado' => $faker->sentence,
        'pais' => $faker->sentence,
        'cep' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Insumo::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'observacao_id' => $faker->sentence,
        'percentual_desperdicio' => $faker->randomNumber(5),
        'quantidade_referencia' => $faker->randomNumber(5),
        'unidade_referencia' => $faker->sentence,
        'preco_pos_desperdicio' => $faker->randomNumber(5),
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Receita::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'modo_preparo' => $faker->sentence,
        'rendimento' => $faker->randomNumber(5),
        'porcao' => $faker->randomNumber(5),
        'unidade_porcao' => $faker->sentence,
        'preparo_altera_peso' => $faker->boolean(),
        'percentual_altera_peso' => $faker->randomNumber(5),
        'observacao_id' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Produto::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'descricao' => $faker->sentence,
        'observacao_id' => $faker->sentence,
        'validade' => $faker->date(),
        'estoque' => $faker->randomNumber(5),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Fornecedor::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'endereco_id' => $faker->sentence,
        'nome_contato' => $faker->sentence,
        'observacao_id' => $faker->sentence,
        'is_ativo' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ReceitasIngrediente::class, static function (Faker\Generator $faker) {
    return [
        'receita_id' => $faker->sentence,
        'insumo_id' => $faker->sentence,
        'quantidade' => $faker->randomNumber(5),
        'unidade' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Produtositem::class, static function (Faker\Generator $faker) {
    return [
        'produto_id' => $faker->sentence,
        'receita_id' => $faker->sentence,
        'insumo_id' => $faker->sentence,
        'quantidade' => $faker->randomNumber(5),
        'porcentagem_mao_obra' => $faker->randomNumber(5),
        'porcentagem_lucro' => $faker->randomNumber(5),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,
        'unidade' => $faker->randomNumber(5),


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'sobrenome' => $faker->sentence,
        'apelido' => $faker->sentence,
        'documento' => $faker->sentence,
        'documentos_tipo_id' => $faker->sentence,
        'data_aniversario' => $faker->date(),
        'endereco_id' => $faker->sentence,
        'observacao_id' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProdutosCusto::class, static function (Faker\Generator $faker) {
    return [
        'produto_id' => $faker->sentence,
        'canais_venda_id' => $faker->sentence,
        'inicio_vigencia' => $faker->dateTime,
        'fim_vigencia' => $faker->dateTime,
        'valor_custo' => $faker->randomNumber(5),
        'valor_venda' => $faker->randomNumber(5),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\InsumosCusto::class, static function (Faker\Generator $faker) {
    return [
        'insumo_id' => $faker->sentence,
        'insumos_marca_id' => $faker->sentence,
        'fornecedor_id' => $faker->sentence,
        'data_compra' => $faker->date(),
        'quantidade' => $faker->randomNumber(5),
        'unidade' => $faker->sentence,
        'valor_compra' => $faker->randomNumber(5),
        'valor_unitario' => $faker->randomNumber(5),
        'is_atual' => $faker->boolean(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProdutosCustosIncentivosVenda::class, static function (Faker\Generator $faker) {
    return [
        'incentivos_venda_id' => $faker->sentence,
        'produtos_custo_id' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Contato::class, static function (Faker\Generator $faker) {
    return [
        'fornecedor_id' => $faker->sentence,
        'cliente_id' => $faker->sentence,
        'contatos_tipo_id' => $faker->sentence,
        'contato' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, static function (Faker\Generator $faker) {
    return [
        'cliente_id' => $faker->sentence,
        'canais_venda_id' => $faker->sentence,
        'data_confirmacao_pedido' => $faker->dateTime,
        'data_entrega_prevista' => $faker->dateTime,
        'data_entrega_realizada' => $faker->dateTime,
        'forma_pagto_entrada_id' => $faker->sentence,
        'data_limite_entrada' => $faker->dateTime,
        'porcentagem_entrada' => $faker->randomNumber(5),
        'data_pedido' => $faker->dateTime,
        'valor_entrada' => $faker->randomNumber(5),
        'data_pagto_entrada' => $faker->dateTime,
        'forma_pagto_restante_id' => $faker->sentence,
        'data_restante' => $faker->dateTime,
        'valor_restante' => $faker->randomNumber(5),
        'observacao_id' => $faker->sentence,
        'endereco_entrega_id' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PedidosItem::class, static function (Faker\Generator $faker) {
    return [
        'pedido_id' => $faker->sentence,
        'numero_sequencial' => $faker->randomNumber(5),
        'produto_id' => $faker->sentence,
        'quantidade' => $faker->randomNumber(5),
        'preco_unitario' => $faker->randomNumber(5),
        'observacao_id' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PedidosDesconto::class, static function (Faker\Generator $faker) {
    return [
        'pedido_id' => $faker->sentence,
        'pedidos_item_id' => $faker->sentence,
        'desconto' => $faker->randomNumber(5),
        'unidade_desconto' => $faker->sentence,
        'valor_desconto' => $faker->randomNumber(5),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PedidosCancelamento::class, static function (Faker\Generator $faker) {
    return [
        'pedido_id' => $faker->sentence,
        'pedidos_item_id' => $faker->sentence,
        'data_solicitacao' => $faker->sentence,
        'taxa_cancelamento' => $faker->randomNumber(5),
        'unidade' => $faker->sentence,
        'valor_cancelamento' => $faker->randomNumber(5),
        'valor_reembolso' => $faker->randomNumber(5),
        'data_reembolso' => $faker->date(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,


    ];
});
