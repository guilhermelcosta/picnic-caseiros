@extends('admin.layout.default')

@section('title', trans('admin.insumos-custo.actions.create') . ($insumo ? ': ' . $insumo->descricao : ''))

@section('body')

    <div class="container-xl">
        <div class="card">

            <insumos-custo-form
                :insumo="{{ $insumo ? $insumo->toJson() : json_encode(null) }}"
                :action="'{{ url('admin/insumos-custos') }}'"
                v-cloak
                inline-template
            >

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.insumos-custo.actions.create') . ($insumo ? ': ' . $insumo->descricao : '') }}
                </div>

                <div class="card-body">
                    @include('admin.insumos-custo.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('admin-ui.btn.save') }}
                    </button>
                </div>

            </form>

        </insumos-custo-form>

        </div>

        </div>


@endsection
