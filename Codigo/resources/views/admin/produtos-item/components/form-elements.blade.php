<div class="form-group row align-items-center" :class="{'has-danger': errors.has('produto_id'), 'has-success': fields.produto_id && fields.produto_id.valid }">
    <label for="produto_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.produto_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.produto_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('produto_id'), 'form-control-success': fields.produto_id && fields.produto_id.valid}" id="produto_id" name="produto_id" placeholder="{{ trans('admin.produtos-item.columns.produto_id') }}">
        <div v-if="errors.has('produto_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('produto_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('receita_id'), 'has-success': fields.receita_id && fields.receita_id.valid }">
    <label for="receita_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.receita_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.receita_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('receita_id'), 'form-control-success': fields.receita_id && fields.receita_id.valid}" id="receita_id" name="receita_id" placeholder="{{ trans('admin.produtos-item.columns.receita_id') }}">
        <div v-if="errors.has('receita_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('receita_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('insumo_id'), 'has-success': fields.insumo_id && fields.insumo_id.valid }">
    <label for="insumo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.insumo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.insumo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insumo_id'), 'form-control-success': fields.insumo_id && fields.insumo_id.valid}" id="insumo_id" name="insumo_id" placeholder="{{ trans('admin.produtos-item.columns.insumo_id') }}">
        <div v-if="errors.has('insumo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insumo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantidade'), 'has-success': fields.quantidade && fields.quantidade.valid }">
    <label for="quantidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.quantidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantidade" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantidade'), 'form-control-success': fields.quantidade && fields.quantidade.valid}" id="quantidade" name="quantidade" placeholder="{{ trans('admin.produtos-item.columns.quantidade') }}">
        <div v-if="errors.has('quantidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('porcentagem_mao_obra'), 'has-success': fields.porcentagem_mao_obra && fields.porcentagem_mao_obra.valid }">
    <label for="porcentagem_mao_obra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.porcentagem_mao_obra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.porcentagem_mao_obra" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('porcentagem_mao_obra'), 'form-control-success': fields.porcentagem_mao_obra && fields.porcentagem_mao_obra.valid}" id="porcentagem_mao_obra" name="porcentagem_mao_obra" placeholder="{{ trans('admin.produtos-item.columns.porcentagem_mao_obra') }}">
        <div v-if="errors.has('porcentagem_mao_obra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('porcentagem_mao_obra') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('porcentagem_lucro'), 'has-success': fields.porcentagem_lucro && fields.porcentagem_lucro.valid }">
    <label for="porcentagem_lucro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.porcentagem_lucro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.porcentagem_lucro" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('porcentagem_lucro'), 'form-control-success': fields.porcentagem_lucro && fields.porcentagem_lucro.valid}" id="porcentagem_lucro" name="porcentagem_lucro" placeholder="{{ trans('admin.produtos-item.columns.porcentagem_lucro') }}">
        <div v-if="errors.has('porcentagem_lucro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('porcentagem_lucro') }}</div>
    </div>
</div>


