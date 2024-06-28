@extends('admin.layout.default')

@section('title', trans('admin.incentivos-venda.actions.edit', ['name' => $incentivosVenda['descricao']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <incentivos-venda-form
                :action="'{{ $incentivosVenda['resource_url'] }}'"
                :data="{{ json_encode($incentivosVenda) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.incentivos-venda.actions.edit', ['name' => $incentivosVenda['descricao']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.incentivos-venda.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </incentivos-venda-form>

        </div>

</div>

@endsection
