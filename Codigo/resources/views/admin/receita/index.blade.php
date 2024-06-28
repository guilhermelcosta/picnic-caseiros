@extends('admin.layout.default')

@section('title', trans('admin.receita.actions.index'))

@section('body')

    <receita-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/receitas') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.receita.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/receitas/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.receita.actions.create') }}</a>
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
                                                
                                            </label>
                                        </th>

                                        <!-- <th is='sortable' :column="'id'">{{ trans('admin.receita.columns.id') }}</th> -->
                                        <th is='sortable' :column="'descricao'">{{ trans('admin.receita.columns.descricao') }}</th>
                                        <th is='sortable' :column="'modo_preparo'">{{ trans('admin.receita.columns.modo_preparo') }}</th>
                                        <th is='sortable' :column="'rendimento'">{{ trans('admin.receita.columns.rendimento') }}</th>
                                        <th is='sortable' :column="'porcao'">{{ trans('admin.receita.columns.porcao') }}</th>
                                        <!-- <th is='sortable' :column="'unidade_porcao'">{{ trans('admin.receita.columns.unidade_porcao') }}</th> -->
                                        <th is='sortable' :column="'preparo_altera_peso'">{{ trans('admin.receita.columns.preparo_altera_peso') }}</th>
                                        <th is='sortable' :column="'percentual_altera_peso'">{{ trans('admin.receita.columns.percentual_altera_peso') }}</th>
                                        <th is='sortable' :column="'observacao_id'">{{ trans('admin.receita.columns.observacao_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="11">
                                            <span class="align-middle font-weight-light text-dark">@{{ clickedBulkItemsCount }} {{ trans('admin-ui.listing.selected_items') }}. <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/receitas')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i>{{ trans('admin-ui.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('admin-ui.listing.uncheck_all_items') }}</a> </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/receitas/bulk-destroy')">{{ trans('admin-ui.btn.delete') }}</button>
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

                                    <!-- <td>@{{ item.id }}</td> -->
                                        <td>@{{ item.descricao }}</td>
                                        <td>@{{ item.modo_preparo }}</td>
                                        <td>@{{ item.rendimento }} p</td>
                                        <td>@{{ formatMeasure(item.porcao, item.unidade_porcao) }}</td>
                                        <!-- <td>@{{ item.unidade_porcao }}</td> -->
                                        <td>@{{ item.preparo_altera_peso ? 'Sim' : 'Não' }}</td>
                                        <td>@{{ formatPercentage(item.percentual_altera_peso) }}</td>
                                        <td>@{{ item.observacao?.observacao ?? "" }}</td>

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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/receitas/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.receita.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </receita-listing>

@endsection