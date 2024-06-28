<?php

return [
    'admin-user' => [
        'title' => 'Usuário',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Editar :name',
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
        'title' => 'Tipos de Logradouro',

        'actions' => [
            'index' =>'Tipos de Logradouro',
            'create' => 'Novo Tipo de Logradouro',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'descricao' => 'Descrição',
            'is_ativo' => 'Status',

        ],

        'placeholder' => [
            'descricao' => 'Informe o tipo da via',
            'is_ativo' => 'Tipo de logradouro está ativo?'
        ],
    ],

    'observacao' => [
        'title' => 'Observações',

        'actions' => [
            'index' => 'Observações',
            'create' => 'New Observação',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'observacao' => 'Observação',
        ],

    ],

    'insumos-marca' => [
        'title' => 'Marcas de Insumos',

        'actions' => [
            'index' => 'Marcas de Insumos',
            'create' => 'Nova Marca de Insumo',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'is_ativo' => 'Is ativo',
        ],

    ],

    'canais-venda' => [
        'title' => 'Canais de Vendas',

        'actions' => [
            'index' => 'Canais de Vendas',
            'create' => 'Novo Canal de Venda',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'comissao' => 'Comissão',
            'unidade_comissao' => 'Unidade de Comissão',
            'desconto' => 'Desconto',
            'unidade_desconto' => 'Unidade de Desconto',
        ],

        'placeholder' => [
            'id' => 'ID',
            'descricao' => 'Informe a descrição do canal de venda',
            'comissao' => 'Informe a comissão para este canal de venda',
            'unidade_comissao' => 'Selecione a unidade de comissão',
            'desconto' => 'Informe o desconto para este canal de venda',
            'unidade_desconto' => 'Selecione a unidade de desconto',
        ],
    ],

    'incentivos-venda' => [
        'title' => 'Incentivos de Venda',

        'actions' => [
            'index' => 'Incentivos de Venda',
            'create' => 'Novo Incentivo de Venda',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'unidade' => 'Unidade',
            'maximo_moeda' => 'Valor Máximo',
            'vigencias' => 'Vigências',
            'inicio_vigencia' => 'Início da vigência',
            'fim_vigencia' => 'Fim da vigência',
        ],

        'placeholder' => [
            'id' => 'ID',
            'descricao' => 'Informe a descrição do incentivo',
            'valor' => 'Informe o valor do incentivo',
            'unidade' => 'Selecione a unidade do incentivo',
            'maximo_moeda' => 'Informe o valor máximo, em moeda',
            'inicio_vigencia' => 'Início da vigência',
            'fim_vigencia' => 'Fim da vigência',
            'is_ativo' => 'Incentivo de venda está ativo?',
        ],
    ],

    'documentos-tipo' => [
        'title' => 'Tipos de Documento',

        'actions' => [
            'index' => 'Tipos de Documento',
            'create' => 'Novo Tipo de Documento',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'descricao' => 'Descrição',
            'is_ativo' => 'Status',
        ],

        'placeholder' => [
            'descricao' => 'Informe o tipo de documento',
            'is_ativo' => 'Tipo de documento está ativo?'
        ],
    ],

    'contatos-tipo' => [
        'title' => 'Tipos de Contato',

        'actions' => [
            'index' => 'Tipos de Contato',
            'create' => 'Novo Tipo de Contato',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'descricao' => 'Descrição',
            'is_ativo' => 'Status',
        ],

        'placeholder' => [
            'descricao' => 'Informe o tipo de contato',
            'is_ativo' => 'Tipo de contato está ativo?'
        ],
    ],

    'formas-pagamento' => [
        'title' => 'Formas Pagamentos',

        'actions' => [
            'index' => 'Formas Pagamentos',
            'create' => 'New Formas Pagamento',
            'edit' => 'Editar :name',
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
            'index' => 'Endereços',
            'create' => 'Novo Endereço',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
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

        'abreviacao' => [
            'complemento' => 'Compl.',
        ],

        'placeholder' => [
            'logradouros_tipo_id' => 'Logradouro Tipo Id',
            'logradouro' => 'Informe o logradouro',
            'numero' => 'Informe o número',
            'complemento' => 'Informe o complemento',
            'bairro' => 'Informe o bairro',
            'cidade' => 'Informe o cidade',
            'estado' => 'Informe o estado',
            'pais' => 'Informe o país',
            'cep' => 'Informe o cep',
        ],

        'link' => [
            'find-cep' => [
                'text' => 'Buscar CEP',
                'to' => 'https://buscacepinter.correios.com.br/app/endereco/index.php'
            ]
        ]
    ],

    'insumo' => [
        'title' => 'Insumo',

        'actions' => [
            'index' => 'Insumos',
            'create' => 'Novo Insumo',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'descricao' => 'Descrição',
            'observacao' => 'Observação',
            'percentual_desperdicio' => 'Percentual de desperdício',
            'quantidade_referencia' => 'Quantidade de referência',
            'unidade_referencia' => 'Unidade de referência',
            'preco_pos_desperdicio' => 'Preço pós desperdício',
            'is_ativo' => 'Status',
        ],

        'placeholder' => [
            'descricao' => 'Informe a descrição do insumo',
            'observacao' => 'Acrescente observações a este insumo',
            'percentual_desperdicio' => 'Informe o percentual de desperdício',
            'quantidade_referencia' => 'Informe a quantidade de referência',
            'unidade_referencia' => 'Selecione a unidade de referência',
            'preco_pos_desperdicio' => 'Informe o preço pós desperdício',
            'is_ativo' => 'Insumo está ativo?',
        ],

        'abreviacao' => [
            'percentual_desperdicio' => '% desperdício',
            'quantidade_referencia' => 'Qtd. referência',
            'unidade_referencia' => 'Un. referência',
        ],

        'custo' => [
            'title' => 'Insumos Custos',

            'actions' => [
                'index' => 'Custos: :insumo',
                'create' => 'Nova Compra de :insumo',
                'edit' => 'Editar :name',
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
    ],

    'receita' => [
        'title' => 'Receitas',

        'actions' => [
            'index' => 'Receitas',
            'create' => 'Nova Receita',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'descricao' => 'Nome *',
            'modo_preparo' => 'Modo de preparo',
            'rendimento' => 'Rendimento',
            'porcao' => 'Porção',
            'unidade_porcao' => 'Unidade da porção',
            'validade_dias' => 'Validade',
            'preparo_altera_peso' => 'Preparo altera peso',
            'percentual_altera_peso' => 'Percentual de alteração',
            'observacao_id' => 'Observação',
        ],

        'placeholder' => [
            'descricao' => 'Informe o nome da receita',
            'modo_preparo' => 'Descreva o modo de preparo da receita',
            'rendimento' => 'Informe a quantidade de porções',
            'porcao' => 'Informe o tamanho da porção',
            'unidade_porcao' => 'Selecione a unidade da porção',
            'validade_dias' => 'Informe a validade, em dias',
            'preparo_altera_peso' => 'Preparo da receita altera o peso final?',
            'percentual_altera_peso' => 'Informe o percentual de alteração do peso',
            'observacao_id' => 'Acrescente observações a esta receita',
        ],
    ],

    'ingrediente' => [
        'title' => 'Ingrediente',

        'actions' => [
            'index' => 'Ingredientes',
        ],

        'columns' => [
            'ingrediente' => 'Ingrediente',
        ],

        'placeholder' => [
            'ingrediente' => 'Selecione o ingrediente',
            'quantidade' => 'Informe a quantidade de ingrediente',
            'unidade' => 'Selecione a unidade do ingrediente',
        ],

        'link' => [
            'adicionar' => [
                'text' => 'Adicionar ingrediente',
                'to' => '/',
            ]
        ]
    ],

    'produto' => [
        'title' => 'Produtos',

        'actions' => [
            'index' => 'Produtos',
            'create' => 'Novo Produto',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'observacao' => 'Observação',
            'estoque' => 'Estoque',
        ],

        'placeholder' => [
            'id' => 'ID',
            'nome' => 'Informe o nome do produto',
            'descricao' => 'Informe a descrição do produto',
            'observacao' => 'Acrescente observações a este produto',
            'estoque' => 'Informe a quantidade disponível em estoque',
        ],
    ],

    'fornecedor' => [
        'title' => 'Fornecedor',

        'actions' => [
            'index' => 'Fornecedores',
            'create' => 'Novo Fornecedor',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'nome' => 'Nome',
            'endereco_id' => 'Endereço',
            'nome_contato' => 'Nome do contato',
            'observacao' => 'Observação',
            'is_ativo' => 'Status',

        ],

        'placeholder' => [
            'nome' => 'Informe o nome do fornecedor',
            'nome_contato' => 'Informe o nome do contato com o fornecedor',
            'is_ativo' => 'Fornecedor está ativo?',
            'observacao' => 'Acrescente observações a este fornecedor',
        ]
    ],

    'receitas-ingrediente' => [
        'title' => 'Receitas Ingredientes',

        'actions' => [
            'index' => 'Receitas Ingredientes',
            'create' => 'New Receitas Ingrediente',
            'edit' => 'Editar :name',
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
            'index' => 'Itens do Produto',
            'create' => 'New Produtos Item',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'produto_id' => 'Produto',
            'item' => 'Item',
            'quantidade' => 'Quantidade',
            'porcentagens' => 'Porcentagens',
            'porcentagem_mao_obra' => 'Porcentagem de mão de obra',
            'porcentagem_lucro' => 'Porcentagem de lucro',
        ],

        'placeholder' => [
            'quantidade' => 'Informe a quantidade deste item',
            'porcentagem_mao_obra' => 'Porcentagem de mão de obra',
            'porcentagem_lucro' => 'Porcentagem de lucro',
        ],

        'link' => [
            'adicionar' => [
                'text' => 'Adicionar item',
                'to' => '/',
            ]
        ]
    ],

    'cliente' => [
        'title' => 'Cliente',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'Novo Cliente',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'apelido' => 'Apelido',
            'documento' => 'Documento',
            'documentos_tipo_id' => 'Tipo de documento',
            'data_aniversario' => 'Data de aniversário',
            'endereco_id' => 'Endereço',
            'observacao' => 'Observação',
        ],

        'placeholder' => [
            'id' => 'Código',
            'nome' => 'Informe o nome do cliente',
            'sobrenome' => 'Informe o sobrenome do cliente',
            'apelido' => 'Informe o apelido do cliente',
            'documento' => 'Informe o número do documento',
            'documentos_tipo_id' => 'Tipo de documento',
            'data_aniversario' => 'Data de aniversário',
            'endereco_id' => 'Endereço',
            'observacao' => 'Acrescente observações a este cliente',
        ],
    ],

    'produtos-custo' => [
        'title' => 'Precificação',

        'actions' => [
            'index' => 'Precificação',
            'create' => 'Nova Precificação',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'produto' => 'Produto',
            'canais_venda' => 'Canal de venda',
            'inicio_vigencia' => 'Inicio de vigência',
            'fim_vigencia' => 'Fim de vigência',
            'valor_custo' => 'Valor de custo',
            'valor_venda' => 'Valor de venda',
        ],

        'placeholder' => [
            'produto' => 'Selecione o produto',
            'canais_venda' => 'Selecione o canal de venda',
            'inicio_vigencia' => 'Inicio de vigência',
            'fim_vigencia' => 'Fim de vigência',
            'valor_custo' => 'Informe o valor de custo do produto',
            'valor_venda' => 'Informe o valor adotado para venda do produto'
        ]
    ],

    'insumos-custo' => [
        'title' => 'Compras de Insumos',

        'actions' => [
            'index' => 'Compras de Insumos',
            'create' => 'Nova Compra de Insumo',
            'edit' => 'Editar Compra de :name',
        ],

        'columns' => [
            'id' => 'ID',
            'insumo' => 'Insumo',
            'insumos_marca' => 'Marca',
            'fornecedor' => 'Fornecedor',
            'data_compra' => 'Data da compra',
            'quantidade' => 'Quantidade',
            'unidade' => 'Unidade',
            'valor_compra' => 'Valor da compra',
            'valor_unitario' => 'Valor unitário',
            'is_atual' => 'Is atual',
        ],

        'placeholder' => [
            'id' => 'ID',
            'data_compra' => 'Data compra',
            'quantidade' => 'Informe a quantidade comprada',
            'unidade' => 'Informe a unidade da quantidade comprada',
            'valor_compra' => 'Informe o valor da compra',
            'valor_unitario' => 'Valor unitário do insumo',
            'is_atual' => 'Is atual',
        ],

        'insumo' => [
            'title' => 'Insumo',

            'link' => [
                'adicionar' => [
                    'text' => 'Adicionar insumo',
                    'to' => '/',
                ],
            ],
        ],
    ],

    'produtos-custos-incentivos-venda' => [
        'title' => 'Produtos Custos Incentivos Vendas',

        'actions' => [
            'index' => 'Produtos Custos Incentivos Vendas',
            'create' => 'New Produtos Custos Incentivos Venda',
            'edit' => 'Editar :name',
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
            'create' => 'Novo Contato',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'Código',
            'fornecedor_id' => 'Fornecedor',
            'cliente_id' => 'Cliente',
            'contatos_tipo_id' => 'Contatos tipo',
            'contato' => 'Contato',
        ],

        'placeholder' => [
            'contato' => 'Informe o contato',
            'contato_tipo_id' => 'Selecione o tipo do contato',
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Editar :name',
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
            'edit' => 'Editar :name',
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
            'edit' => 'Editar :name',
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
            'edit' => 'Editar :name',
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
