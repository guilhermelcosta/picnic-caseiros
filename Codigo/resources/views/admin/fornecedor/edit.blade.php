@extends('admin.layout.default')

@section('title', trans('admin.fornecedor.actions.edit', ['name' => $fornecedor['nome']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <fornecedor-form
                :action="'{{ $fornecedor['resource_url'] }}'"
                :data="{{ json_encode($fornecedor) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.fornecedor.actions.edit', ['name' => $fornecedor['nome']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.fornecedor.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </fornecedor-form>

        </div>

</div>

@endsection
