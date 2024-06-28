@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.insumos-marca.actions.edit', ['name' => $insumosMarca->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <insumos-marca-form
                :action="'{{ $insumosMarca->resource_url }}'"
                :data="{{ $insumosMarca->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.insumos-marca.actions.edit', ['name' => $insumosMarca->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.insumos-marca.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </insumos-marca-form>

        </div>
    
</div>

@endsection