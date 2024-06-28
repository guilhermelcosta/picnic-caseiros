<div class="form-group row align-items-center" :class="{'has-danger': errors.has('incentivos_venda_id'), 'has-success': fields.incentivos_venda_id && fields.incentivos_venda_id.valid }">
    <label for="incentivos_venda_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custos-incentivos-venda.columns.incentivos_venda_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.incentivos_venda_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('incentivos_venda_id'), 'form-control-success': fields.incentivos_venda_id && fields.incentivos_venda_id.valid}" id="incentivos_venda_id" name="incentivos_venda_id" placeholder="{{ trans('admin.produtos-custos-incentivos-venda.columns.incentivos_venda_id') }}">
        <div v-if="errors.has('incentivos_venda_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('incentivos_venda_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('produtos_custo_id'), 'has-success': fields.produtos_custo_id && fields.produtos_custo_id.valid }">
    <label for="produtos_custo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custos-incentivos-venda.columns.produtos_custo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.produtos_custo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('produtos_custo_id'), 'form-control-success': fields.produtos_custo_id && fields.produtos_custo_id.valid}" id="produtos_custo_id" name="produtos_custo_id" placeholder="{{ trans('admin.produtos-custos-incentivos-venda.columns.produtos_custo_id') }}">
        <div v-if="errors.has('produtos_custo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('produtos_custo_id') }}</div>
    </div>
</div>


