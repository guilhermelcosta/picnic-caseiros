@extends('admin.layout.default')

@section('title', trans('admin.insumo.actions.edit', ['name' => $insumo['descricao']]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <insumo-form
                :action="'{{ $insumo['resource_url'] }}'"
                :data="{{ json_encode($insumo) }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.insumo.actions.edit', ['name' => $insumo['descricao']]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.insumo.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </insumo-form>

        </div>

</div>

@endsection
