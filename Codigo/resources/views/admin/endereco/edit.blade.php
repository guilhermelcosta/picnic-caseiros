@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.endereco.actions.edit', ['name' => $endereco->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <endereco-form
                :action="'{{ $endereco->resource_url }}'"
                :data="{{ $endereco->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.endereco.actions.edit', ['name' => $endereco->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.endereco.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin-ui.btn.save') }}
                        </button>
                    </div>

                </form>

        </endereco-form>

        </div>

</div>

@endsection
