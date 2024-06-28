@extends('admin.layout.default')

@section('title', trans('admin.contatos-tipo.actions.edit', ['name' => $contatosTipo->descricao]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <contatos-tipo-form
                :action="'{{ $contatosTipo->resource_url }}'"
                :data="{{ $contatosTipo->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.contatos-tipo.actions.edit', ['name' => $contatosTipo->descricao]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.contatos-tipo.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </contatos-tipo-form>

        </div>

</div>

@endsection
