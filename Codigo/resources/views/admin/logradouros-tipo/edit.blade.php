@extends('admin.layout.default')

@section('title', trans('admin.logradouros-tipo.actions.edit', ['name' => $logradourosTipo->descricao]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <logradouros-tipo-form
                :action="'{{ $logradourosTipo->resource_url }}'"
                :data="{{ $logradourosTipo->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.logradouros-tipo.actions.edit', ['name' => $logradourosTipo->descricao]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.logradouros-tipo.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </logradouros-tipo-form>

        </div>

</div>

@endsection
