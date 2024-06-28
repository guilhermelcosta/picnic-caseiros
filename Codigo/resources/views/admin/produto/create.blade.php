@extends('admin.layout.default')

@section('title', trans('admin.produto.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <produto-form
            :action="'{{ url('admin/produtos') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.produto.actions.create') }}
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" role="button" @click="autofill()">Autopreencher</a>
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
