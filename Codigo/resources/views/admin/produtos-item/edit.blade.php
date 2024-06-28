@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.produtos-item.actions.edit', ['name' => $produtosItem->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <produtos-item-form
                :action="'{{ $produtosItem->resource_url }}'"
                :data="{{ $produtosItem->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.produtos-item.actions.edit', ['name' => $produtosItem->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.produtos-item.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </produtos-item-form>

        </div>
    
</div>

@endsection