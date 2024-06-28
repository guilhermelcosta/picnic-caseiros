<div class="form-group row align-items-center" :class="{'has-danger': errors.has('receita_id'), 'has-success': fields.receita_id && fields.receita_id.valid }">
    <label for="receita_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receitas-ingrediente.columns.receita_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.receita_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('receita_id'), 'form-control-success': fields.receita_id && fields.receita_id.valid}" id="receita_id" name="receita_id" placeholder="{{ trans('admin.receitas-ingrediente.columns.receita_id') }}">
        <div v-if="errors.has('receita_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('receita_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('insumo_id'), 'has-success': fields.insumo_id && fields.insumo_id.valid }">
    <label for="insumo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receitas-ingrediente.columns.insumo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.insumo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insumo_id'), 'form-control-success': fields.insumo_id && fields.insumo_id.valid}" id="insumo_id" name="insumo_id" placeholder="{{ trans('admin.receitas-ingrediente.columns.insumo_id') }}">
        <div v-if="errors.has('insumo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insumo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantidade'), 'has-success': fields.quantidade && fields.quantidade.valid }">
    <label for="quantidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receitas-ingrediente.columns.quantidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantidade" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantidade'), 'form-control-success': fields.quantidade && fields.quantidade.valid}" id="quantidade" name="quantidade" placeholder="{{ trans('admin.receitas-ingrediente.columns.quantidade') }}">
        <div v-if="errors.has('quantidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade'), 'has-success': fields.unidade && fields.unidade.valid }">
    <label for="unidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receitas-ingrediente.columns.unidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidade" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade'), 'form-control-success': fields.unidade && fields.unidade.valid}" id="unidade" name="unidade" placeholder="{{ trans('admin.receitas-ingrediente.columns.unidade') }}">
        <div v-if="errors.has('unidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade') }}</div>
    </div>
</div>


