@extends('admin.layout.default')

@section('title', trans('admin.produtos-custo.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <produtos-custo-form
            :action="'{{ url('admin/produtos-custos') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.produtos-custo.actions.create') }}
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
