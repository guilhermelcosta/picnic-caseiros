@extends('admin.layout.default')

@section('title', trans('admin.receita.actions.edit', ['name' => $receita['descricao']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <receita-form
                :action="'{{ $receita['resource_url'] }}'"
                :data="{{ json_encode($receita) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.receita.actions.edit', ['name' => $receita['descricao']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.receita.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </receita-form>

        </div>

</div>

@endsection
