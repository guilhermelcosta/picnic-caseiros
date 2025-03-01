@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.pedidos-item.actions.edit', ['name' => $pedidosItem->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <pedidos-item-form
                :action="'{{ $pedidosItem->resource_url }}'"
                :data="{{ $pedidosItem->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.pedidos-item.actions.edit', ['name' => $pedidosItem->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.pedidos-item.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </pedidos-item-form>

        </div>
    
</div>

@endsection