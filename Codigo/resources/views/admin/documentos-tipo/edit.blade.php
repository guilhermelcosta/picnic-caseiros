@extends('admin.layout.default')

@section('title', trans('admin.documentos-tipo.actions.edit', ['name' => $documentosTipo->descricao]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <documentos-tipo-form
                :action="'{{ $documentosTipo->resource_url }}'"
                :data="{{ $documentosTipo->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.documentos-tipo.actions.edit', ['name' => $documentosTipo->descricao]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.documentos-tipo.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </documentos-tipo-form>

        </div>

</div>

@endsection
