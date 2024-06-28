@extends('admin.layout.default')

@section('title', trans('admin.insumos-custo.actions.index'))

@section('body')

    <insumos-custo-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/insumos-custos') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.insumos-custo.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/insumos-custos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.insumos-custo.actions.create') }}</a>
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
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.insumos-custo.columns.id') }}</th>
                                        <th is='sortable' :column="'insumo_id'">{{ trans('admin.insumos-custo.columns.insumo_id') }}</th>
                                        <th is='sortable' :column="'insumos_marca_id'">{{ trans('admin.insumos-custo.columns.insumos_marca_id') }}</th>
                                        <th is='sortable' :column="'fornecedor_id'">{{ trans('admin.insumos-custo.columns.fornecedor_id') }}</th>
                                        <th is='sortable' :column="'data_compra'">{{ trans('admin.insumos-custo.columns.data_compra') }}</th>
                                        <th is='sortable' :column="'quantidade'">{{ trans('admin.insumos-custo.columns.quantidade') }}</th>
                                        <th is='sortable' :column="'unidade'">{{ trans('admin.insumos-custo.columns.unidade') }}</th>
                                        <th is='sortable' :column="'valor_compra'">{{ trans('admin.insumos-custo.columns.valor_compra') }}</th>
                                        <th is='sortable' :column="'valor_unitario'">{{ trans('admin.insumos-custo.columns.valor_unitario') }}</th>
                                        <th is='sortable' :column="'is_atual'">{{ trans('admin.insumos-custo.columns.is_atual') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="12">
                                            <span class="align-middle font-weight-light text-dark">@{{ clickedBulkItemsCount }} {{ trans('admin-ui.listing.selected_items') }}. <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/insumos-custos')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('admin-ui.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('admin-ui.listing.uncheck_all_items') }}</a> </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/insumos-custos/bulk-destroy')">{{ trans('admin-ui.btn.delete') }}</button>
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
                                        <td>@{{ item.insumo_id }}</td>
                                        <td>@{{ item.insumos_marca_id }}</td>
                                        <td>@{{ item.fornecedor_id }}</td>
                                        <td>@{{ item.data_compra | date }}</td>
                                        <td>@{{ item.quantidade }}</td>
                                        <td>@{{ item.unidade }}</td>
                                        <td>@{{ item.valor_compra }}</td>
                                        <td>@{{ item.valor_unitario }}</td>
                                        <td>@{{ item.is_atual }}</td>

                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('admin-ui.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/insumos-custos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.insumos-custo.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </insumos-custo-listing>

@endsection
