@extends('admin.layout.default')

@section('title', trans('admin.produtos-custo.actions.edit', ['name' => $produtosCusto['produto']['nome']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <produtos-custo-form
                :action="'{{ $produtosCusto['resource_url'] }}'"
                :data="{{ json_encode($produtosCusto) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.produtos-custo.actions.edit', ['name' => $produtosCusto['produto']['nome']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.produtos-custo.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </produtos-custo-form>

        </div>

</div>

@endsection
