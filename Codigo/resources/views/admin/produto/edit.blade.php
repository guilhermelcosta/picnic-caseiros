@extends('admin.layout.default')

@section('title', trans('admin.produto.actions.edit', ['name' => $produto['descricao']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <produto-form
                :action="'{{ $produto['resource_url'] }}'"
                :data="{{ json_encode($produto) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.produto.actions.edit', ['name' => $produto['descricao']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.produto.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </produto-form>

        </div>

</div>

@endsection
