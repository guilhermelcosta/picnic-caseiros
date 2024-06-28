<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('admin-ui.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><img class="nav-icon" src="{{ asset('images/atendimento-ao-cliente.svg') }}" alt=""> {{ trans('admin.cliente.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/insumos') }}"><img class="nav-icon" src="{{ asset('images/doacao-de-alimentos.svg') }}" alt=""> {{ trans('admin.insumo.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/insumos-marcas') }}"><img class="nav-icon" src="{{ asset('images/verificacao.svg') }}" alt=""> {{ trans('admin.insumos-marca.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/insumos-custos') }}"><img class="nav-icon" src="{{ asset('images/historico.svg') }}" alt=""></i> {{ trans('admin.insumos-custo.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/fornecedores') }}"><img class="nav-icon" src="{{ asset('images/entregador.svg') }}" alt=""> {{ trans('admin.fornecedor.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/receitas') }}"><img class="nav-icon" src="{{ asset('images/receita.svg') }}" alt=""> {{ trans('admin.receita.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/produtos') }}"><img class="nav-icon" src="{{ asset('images/bolo.svg') }}" alt="">{{ trans('admin.produto.title') }}</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/observacoes') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.observacao.title') }}</a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/canais-vendas') }}"><img class="nav-icon" src="{{ asset('images/canal.svg') }}" alt=""> {{ trans('admin.canais-venda.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/incentivos-vendas') }}"><img class="nav-icon" fill="currentColor" src="{{ asset('images/icentivovenda.svg') }}" alt=""> {{ trans('admin.incentivos-venda.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/produtos-custos') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.produtos-custo.title') }}</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/formas-pagamentos') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.formas-pagamento.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/enderecos') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.endereco.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/receitas-ingredientes') }}"><img class="nav-icon" src="{{ asset('images/ingredientes.svg') }}" alt=""> {{ trans('admin.receitas-ingrediente.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/produtos-itens') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.produtos-item.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/produtos-custos-incentivos-vendas') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.produtos-custos-incentivos-venda.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/contatos') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.contato.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.pedido.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos-itens') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.pedidos-item.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos-descontos') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.pedidos-desconto.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos-cancelamentos') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.pedidos-cancelamento.title') }}</a></li> -->
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('admin-ui.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/contatos-tipos') }}"><img class="nav-icon" src="{{ asset('images/livros-de-contato.svg') }}" alt=""> {{ trans('admin.contatos-tipo.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/documentos-tipos') }}"><img class="nav-icon" src="{{ asset('images/documentos.svg') }}" alt=""> {{ trans('admin.documentos-tipo.title') }}</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/logradouros-tipos') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.logradouros-tipo.title') }}</a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><img class="nav-icon" src="{{ asset('images/account-manager.svg') }}" alt=""> {{ __('Manage access') }}</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li> -->
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
