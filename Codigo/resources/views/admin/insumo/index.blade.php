@extends('admin.layout.default')

@section('title', trans('admin.insumo.actions.index'))

@section('body')

    <insumo-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/insumos') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.insumo.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/insumos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.insumo.actions.create') }}</a>
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/produtos-custos/calcula-custo') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ 'calcula custo' }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('admin-ui.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('admin-ui.btn.search') }}</button>
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
                                            <label class="form-check-label" for="enabled"></label>
                                        </th>

                                        <!-- <th is='sortable' :column="'id'">{{ trans('admin.insumo.columns.id') }}</th> -->
                                        <th is='sortable' :column="'descricao'">{{trans('Nome') }}</th>
                                        <th is='sortable' :column="'observacao.observacao'">{{trans('admin.insumo.columns.observacao') }}</th>
                                        <th is='sortable' :column="'percentual_desperdicio'">{{trans('Desperdício') }}</th>
                                        <th is='sortable' :column="'quantidade_referencia'">Quantidade</th>
                                        <!-- <th is='sortable' :column="'unidade_referencia'">{{ trans('admin.insumo.columns.unidade_referencia') }}</th> -->
                                        <th is='sortable' :column="'preco_pos_desperdicio'">{{trans('admin.insumo.columns.preco_pos_desperdicio') }}</th>
                                        <th is='sortable' :column="'is_ativo'">Status</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="10">
                                            <span class="align-middle font-weight-light text-dark">@{{ clickedBulkItemsCount }} {{ trans('admin-ui.listing.selected_items') }}. <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/insumos')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('admin-ui.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('admin-ui.listing.uncheck_all_items') }}</a> </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/insumos/bulk-destroy')">{{ trans('admin-ui.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''" >
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id" :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <!-- <td>@{{ item.id }}</td> -->
                                        <td>@{{ item.descricao }}</td>
                                        <td>@{{ item.observacao?.observacao ?? "" }}</td>
                                        <td>@{{ formatValue(item.percentual_desperdicio, "1") }}</td>
                                        <td>@{{ formatMeasure(item.quantidade_referencia, item.unidade_referencia) }}</td>
                                        <!-- <td>@{{ getMeasureSymbol(item.unidade_referencia) }}</td> -->
                                        <td>@{{ formatReal(item.preco_pos_desperdicio) }}</td>
                                        <td class = "active" >@{{ item.is_ativo ? 'Ativo' : 'Inativo' }}</td>

                                        <td style="margin: 0%">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <button @click="showModal(modal)" class="btn btn-sm btn-spinner btn-info" id = "show" title="{{ trans('admin-ui.btn.edit') }}" role="button"><i class="fa fa-eye"></i></button>
                                                </div>
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('admin-ui.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="url + '/custos/' + item.id" title="{{ trans('admin-ui.btn.shopping_cart') }}" role="button"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('admin-ui.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('admin-ui.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('admin-ui.index.no_items') }}</h3>
                                <p>{{ trans('admin-ui.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/insumos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.insumo.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </insumo-listing>

@endsection
