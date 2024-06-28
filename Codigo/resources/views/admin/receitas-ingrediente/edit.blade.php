@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.receitas-ingrediente.actions.edit', ['name' => $receitasIngrediente->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <receitas-ingrediente-form
                :action="'{{ $receitasIngrediente->resource_url }}'"
                :data="{{ $receitasIngrediente->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.receitas-ingrediente.actions.edit', ['name' => $receitasIngrediente->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.receitas-ingrediente.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </receitas-ingrediente-form>

        </div>
    
</div>

@endsection