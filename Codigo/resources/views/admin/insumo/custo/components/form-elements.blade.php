<div class="form-group row align-items-center" :class="{'has-danger': errors.has('insumo_id'), 'has-success': fields.insumo_id && fields.insumo_id.valid }">
    <label for="insumo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.insumo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.insumo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insumo_id'), 'form-control-success': fields.insumo_id && fields.insumo_id.valid}" id="insumo_id" name="insumo_id" placeholder="{{ trans('admin.insumos-custo.columns.insumo_id') }}">
        <div v-if="errors.has('insumo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insumo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('insumos_marca_id'), 'has-success': fields.insumos_marca_id && fields.insumos_marca_id.valid }">
    <label for="insumos_marca_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.insumos_marca_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.insumos_marca_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insumos_marca_id'), 'form-control-success': fields.insumos_marca_id && fields.insumos_marca_id.valid}" id="insumos_marca_id" name="insumos_marca_id" placeholder="{{ trans('admin.insumos-custo.columns.insumos_marca_id') }}">
        <div v-if="errors.has('insumos_marca_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insumos_marca_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fornecedor_id'), 'has-success': fields.fornecedor_id && fields.fornecedor_id.valid }">
    <label for="fornecedor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.fornecedor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fornecedor_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fornecedor_id'), 'form-control-success': fields.fornecedor_id && fields.fornecedor_id.valid}" id="fornecedor_id" name="fornecedor_id" placeholder="{{ trans('admin.insumos-custo.columns.fornecedor_id') }}">
        <div v-if="errors.has('fornecedor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fornecedor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_compra'), 'has-success': fields.data_compra && fields.data_compra.valid }">
    <label for="data_compra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.data_compra') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_compra" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_compra'), 'form-control-success': fields.data_compra && fields.data_compra.valid}" id="data_compra" name="data_compra" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_compra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_compra') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantidade'), 'has-success': fields.quantidade && fields.quantidade.valid }">
    <label for="quantidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.quantidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantidade" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantidade'), 'form-control-success': fields.quantidade && fields.quantidade.valid}" id="quantidade" name="quantidade" placeholder="{{ trans('admin.insumos-custo.columns.quantidade') }}">
        <div v-if="errors.has('quantidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade'), 'has-success': fields.unidade && fields.unidade.valid }">
    <label for="unidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.unidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidade" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade'), 'form-control-success': fields.unidade && fields.unidade.valid}" id="unidade" name="unidade" placeholder="{{ trans('admin.insumos-custo.columns.unidade') }}">
        <div v-if="errors.has('unidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_compra'), 'has-success': fields.valor_compra && fields.valor_compra.valid }">
    <label for="valor_compra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.valor_compra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_compra" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_compra'), 'form-control-success': fields.valor_compra && fields.valor_compra.valid}" id="valor_compra" name="valor_compra" placeholder="{{ trans('admin.insumos-custo.columns.valor_compra') }}">
        <div v-if="errors.has('valor_compra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_compra') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_unitario'), 'has-success': fields.valor_unitario && fields.valor_unitario.valid }">
    <label for="valor_unitario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.valor_unitario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_unitario" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_unitario'), 'form-control-success': fields.valor_unitario && fields.valor_unitario.valid}" id="valor_unitario" name="valor_unitario" placeholder="{{ trans('admin.insumos-custo.columns.valor_unitario') }}">
        <div v-if="errors.has('valor_unitario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_unitario') }}</div>
    </div>
</div>

<!-- <div class="form-check row" :class="{'has-danger': errors.has('is_atual'), 'has-success': fields.is_atual && fields.is_atual.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_atual" type="checkbox" v-model="form.is_atual" v-validate="''" data-vv-name="is_atual" name="is_atual_fake_element">
        <label class="form-check-label" for="is_atual">
            {{ trans('admin.insumos-custo.columns.is_atual') }}
        </label>
        <input type="hidden" name="is_atual" :value="form.is_atual">
        <div v-if="errors.has('is_atual')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_atual') }}</div>
    </div>
</div> -->


