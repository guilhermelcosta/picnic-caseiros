@extends('admin.layout.default')

@section('title', trans('admin.cliente.actions.edit', ['name' => $cliente['nome']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cliente-form
                :action="'{{ $cliente['resource_url'] }}'"
                :data="{{ json_encode($cliente) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cliente.actions.edit', ['name' => $cliente['nome']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cliente.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </cliente-form>

        </div>

</div>

@endsection
