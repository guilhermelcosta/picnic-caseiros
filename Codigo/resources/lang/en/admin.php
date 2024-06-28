<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'logradouros-tipo' => [
        'title' => 'Logradouros Tipos',

        'actions' => [
            'index' =>'Logradouros Tipos',
            'create' => 'New Logradouros Tipo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'is_ativo' => 'Is ativo',

        ],
    ],

    'observacao' => [
        'title' => 'Observações',

        'actions' => [
            'index' => 'Observações',
            'create' => 'New Observação',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'observacao' => 'Observação',
        ],

    ],

    'insumos-marca' => [
        'title' => 'Insumos Marcas',

        'actions' => [
            'index' => 'Insumos Marcas',
            'create' => 'New Insumos Marca',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'canais-venda' => [
        'title' => 'Canais Vendas',

        'actions' => [
            'index' => 'Canais Vendas',
            'create' => 'New Canais Venda',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'comissao' => 'Comissão',
            'unidade_comissao' => 'Unidade comissão',
            'desconto' => 'Desconto',
            'unidade_desconto' => 'Unidade desconto',
        ],

    ],

    'incentivos-venda' => [
        'title' => 'Incentivos Vendas',

        'actions' => [
            'index' => 'Incentivos Vendas',
            'create' => 'New Incentivos Venda',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'unidade' => 'Unidade',
            'maximo_moeda' => 'Maximo_moeda',
            'inicio_vigencia' => 'Inicio vigencia',
            'fim_vigencia' => 'Fim vigencia',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'documentos-tipo' => [
        'title' => 'Documentos Tipos',

        'actions' => [
            'index' => 'Documentos Tipos',
            'create' => 'New Documentos Tipo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'contatos-tipo' => [
        'title' => 'Contatos Tipos',

        'actions' => [
            'index' => 'Contatos Tipos',
            'create' => 'New Contatos Tipo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'formas-pagamento' => [
        'title' => 'Formas Pagamentos',

        'actions' => [
            'index' => 'Formas Pagamentos',
            'create' => 'New Formas Pagamento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'endereco' => [
        'title' => 'Endereço',

        'actions' => [
            'index' => 'Endereço',
            'create' => 'New Endereço',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'logradouros_tipo_id' => 'Logradouro Tipo Id',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'pais' => 'País',
            'cep' => 'Cep',
        ],

    ],

    'insumo' => [
        'title' => 'Insumos',

        'actions' => [
            'index' => 'Insumos',
            'create' => 'New Insumo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'observacao_id' => 'Observacao id',
            'percentual_desperdicio' => 'Percentual desperdício',
            'quantidade_referencia' => 'Quantidade referência',
            'unidade_referencia' => 'Unidade referência',
            'preco_pos_desperdicio' => 'Preço pós desperdício',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'receita' => [
        'title' => 'Receitas',

        'actions' => [
            'index' => 'Receitas',
            'create' => 'New Receita',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'modo_preparo' => 'Modo preparo',
            'rendimento' => 'Rendimento',
            'porcao' => 'Porção',
            'unidade_porcao' => 'Unidade porção',
            'preparo_altera_peso' => 'Preparo altera peso',
            'percentual_altera_peso' => 'Percentual altera peso',
            'observacao_id' => 'Observação id',
        ],

    ],

    'produto' => [
        'title' => 'Receitas',

        'actions' => [
            'index' => 'Receitas',
            'create' => 'New Receita',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'observacao_id' => 'Observação id',
            'validade' => 'Validade',
            'estoque' => 'Estoque',
        ],

    ],

    'fornecedor' => [
        'title' => 'Fornecedores',

        'actions' => [
            'index' => 'Fornecedores',
            'create' => 'New Fornecedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'endereco_id' => 'Endereco',
            'nome_contato' => 'Nome contato',
            'observacao_id' => 'Observacao',
            'is_ativo' => 'Is ativo',
            
        ],
    ],

    'receitas-ingrediente' => [
        'title' => 'Receitas Ingredientes',

        'actions' => [
            'index' => 'Receitas Ingredientes',
            'create' => 'New Receitas Ingrediente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'receita_id' => 'Receita',
            'insumo_id' => 'Insumo',
            'quantidade' => 'Quantidade',
            'unidade' => 'Unidade',
            
        ],
    ],

    'produtos-item' => [
        'title' => 'Produtos Itens',

        'actions' => [
            'index' => 'Produtos Itens',
            'create' => 'New Produtos Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'produto_id' => 'Produto',
            'receita_id' => 'Receita',
            'insumo_id' => 'Insumo',
            'quantidade' => 'Quantidade',
            'porcentagem_mao_obra' => 'Porcentagem mao obra',
            'porcentagem_lucro' => 'Porcentagem lucro',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'apelido' => 'Apelido',
            'documento' => 'Documento',
            'documentos_tipo_id' => 'Documentos tipo',
            'data_aniversario' => 'Data aniversario',
            'endereco_id' => 'Endereco',
            'observacao_id' => 'Observacao',
            
        ],
    ],

    'produtos-custo' => [
        'title' => 'Produtos Custos',

        'actions' => [
            'index' => 'Produtos Custos',
            'create' => 'New Produtos Custo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'produto_id' => 'Produto',
            'canais_venda_id' => 'Canais venda',
            'inicio_vigencia' => 'Inicio vigencia',
            'fim_vigencia' => 'Fim vigencia',
            'valor_custo' => 'Valor custo',
            'valor_venda' => 'Valor venda',
            
        ],
    ],

    'insumos-custo' => [
        'title' => 'Insumos Custos',

        'actions' => [
            'index' => 'Insumos Custos',
            'create' => 'New Insumos Custo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'insumo_id' => 'Insumo',
            'insumos_marca_id' => 'Insumos marca',
            'fornecedor_id' => 'Fornecedor',
            'data_compra' => 'Data compra',
            'quantidade' => 'Quantidade',
            'unidade' => 'Unidade',
            'valor_compra' => 'Valor compra',
            'valor_unitario' => 'Valor unitario',
            'is_atual' => 'Is atual',
            
        ],
    ],

    'produtos-custos-incentivos-venda' => [
        'title' => 'Produtos Custos Incentivos Vendas',

        'actions' => [
            'index' => 'Produtos Custos Incentivos Vendas',
            'create' => 'New Produtos Custos Incentivos Venda',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'incentivos_venda_id' => 'Incentivos venda',
            'produtos_custo_id' => 'Produtos custo',
            
        ],
    ],

    'contato' => [
        'title' => 'Contatos',

        'actions' => [
            'index' => 'Contatos',
            'create' => 'New Contato',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'fornecedor_id' => 'Fornecedor',
            'cliente_id' => 'Cliente',
            'contatos_tipo_id' => 'Contatos tipo',
            'contato' => 'Contato',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'canais_venda_id' => 'Canais venda',
            'data_confirmacao_pedido' => 'Data confirmacao pedido',
            'data_entrega_prevista' => 'Data entrega prevista',
            'data_entrega_realizada' => 'Data entrega realizada',
            'forma_pagto_entrada_id' => 'Forma pagto entrada',
            'data_limite_entrada' => 'Data limite entrada',
            'porcentagem_entrada' => 'Porcentagem entrada',
            'data_pedido' => 'Data pedido',
            'valor_entrada' => 'Valor entrada',
            'data_pagto_entrada' => 'Data pagto entrada',
            'forma_pagto_restante_id' => 'Forma pagto restante',
            'data_restante' => 'Data restante',
            'valor_restante' => 'Valor restante',
            'observacao_id' => 'Observacao',
            'endereco_entrega_id' => 'Endereco entrega',
            
        ],
    ],

    'pedidos-item' => [
        'title' => 'Pedidos Itens',

        'actions' => [
            'index' => 'Pedidos Itens',
            'create' => 'New Pedidos Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'pedido_id' => 'Pedido',
            'numero_sequencial' => 'Numero sequencial',
            'produto_id' => 'Produto',
            'quantidade' => 'Quantidade',
            'preco_unitario' => 'Preco unitario',
            'observacao_id' => 'Observacao',
            
        ],
    ],

    'pedidos-desconto' => [
        'title' => 'Pedidos Descontos',

        'actions' => [
            'index' => 'Pedidos Descontos',
            'create' => 'New Pedidos Desconto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'pedido_id' => 'Pedido',
            'pedidos_item_id' => 'Pedidos item',
            'desconto' => 'Desconto',
            'unidade_desconto' => 'Unidade desconto',
            'valor_desconto' => 'Valor desconto',
            
        ],
    ],

    'pedidos-cancelamento' => [
        'title' => 'Pedidos Cancelamentos',

        'actions' => [
            'index' => 'Pedidos Cancelamentos',
            'create' => 'New Pedidos Cancelamento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'pedido_id' => 'Pedido',
            'pedidos_item_id' => 'Pedidos item',
            'data_solicitacao' => 'Data solicitacao',
            'taxa_cancelamento' => 'Taxa cancelamento',
            'unidade' => 'Unidade',
            'valor_cancelamento' => 'Valor cancelamento',
            'valor_reembolso' => 'Valor reembolso',
            'data_reembolso' => 'Data reembolso',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];