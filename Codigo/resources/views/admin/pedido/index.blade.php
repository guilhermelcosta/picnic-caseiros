@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.pedido.actions.index'))

@section('body')

    <pedido-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/pedidos') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.pedido.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/pedidos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.pedido.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled" name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.pedido.columns.id') }}</th>
                                        <th is='sortable' :column="'cliente_id'">{{ trans('admin.pedido.columns.cliente_id') }}</th>
                                        <th is='sortable' :column="'canais_venda_id'">{{ trans('admin.pedido.columns.canais_venda_id') }}</th>
                                        <th is='sortable' :column="'data_confirmacao_pedido'">{{ trans('admin.pedido.columns.data_confirmacao_pedido') }}</th>
                                        <th is='sortable' :column="'data_entrega_prevista'">{{ trans('admin.pedido.columns.data_entrega_prevista') }}</th>
                                        <th is='sortable' :column="'data_entrega_realizada'">{{ trans('admin.pedido.columns.data_entrega_realizada') }}</th>
                                        <th is='sortable' :column="'forma_pagto_entrada_id'">{{ trans('admin.pedido.columns.forma_pagto_entrada_id') }}</th>
                                        <th is='sortable' :column="'data_limite_entrada'">{{ trans('admin.pedido.columns.data_limite_entrada') }}</th>
                                        <th is='sortable' :column="'porcentagem_entrada'">{{ trans('admin.pedido.columns.porcentagem_entrada') }}</th>
                                        <th is='sortable' :column="'data_pedido'">{{ trans('admin.pedido.columns.data_pedido') }}</th>
                                        <th is='sortable' :column="'valor_entrada'">{{ trans('admin.pedido.columns.valor_entrada') }}</th>
                                        <th is='sortable' :column="'data_pagto_entrada'">{{ trans('admin.pedido.columns.data_pagto_entrada') }}</th>
                                        <th is='sortable' :column="'forma_pagto_restante_id'">{{ trans('admin.pedido.columns.forma_pagto_restante_id') }}</th>
                                        <th is='sortable' :column="'data_restante'">{{ trans('admin.pedido.columns.data_restante') }}</th>
                                        <th is='sortable' :column="'valor_restante'">{{ trans('admin.pedido.columns.valor_restante') }}</th>
                                        <th is='sortable' :column="'observacao_id'">{{ trans('admin.pedido.columns.observacao_id') }}</th>
                                        <th is='sortable' :column="'endereco_entrega_id'">{{ trans('admin.pedido.columns.endereco_entrega_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="19">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}. <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/pedidos')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a> </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/pedidos/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id" :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.cliente_id }}</td>
                                        <td>@{{ item.canais_venda_id }}</td>
                                        <td>@{{ item.data_confirmacao_pedido | datetime }}</td>
                                        <td>@{{ item.data_entrega_prevista | datetime }}</td>
                                        <td>@{{ item.data_entrega_realizada | datetime }}</td>
                                        <td>@{{ item.forma_pagto_entrada_id }}</td>
                                        <td>@{{ item.data_limite_entrada | datetime }}</td>
                                        <td>@{{ item.porcentagem_entrada }}</td>
                                        <td>@{{ item.data_pedido | datetime }}</td>
                                        <td>@{{ item.valor_entrada }}</td>
                                        <td>@{{ item.data_pagto_entrada | datetime }}</td>
                                        <td>@{{ item.forma_pagto_restante_id }}</td>
                                        <td>@{{ item.data_restante | datetime }}</td>
                                        <td>@{{ item.valor_restante }}</td>
                                        <td>@{{ item.observacao_id }}</td>
                                        <td>@{{ item.endereco_entrega_id }}</td>
                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/pedidos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.pedido.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </pedido-listing>

@endsection