<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_compra'), 'has-success': fields.data_compra && fields.data_compra.valid }">
    <label for="data_compra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.data_compra') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="date" v-model="form.data_compra" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd'" class="flatpickr form-control" :class="{'form-control-danger': errors.has('data_compra'), 'form-control-success': fields.data_compra && fields.data_compra.valid}" id="data_compra" name="data_compra" placeholder="{{ trans('brackets/admin-placeholder::admin.forms.select_a_date') }}">
        <!-- <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
        <datetime v-model="form.data_compra" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_compra'), 'form-control-success': fields.data_compra && fields.data_compra.valid}" id="data_compra" name="data_compra" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime> -->
        <div v-if="errors.has('data_compra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_compra') }}</div>
    </div>
</div>

<div>
    <span v-for="(insumoCusto, index) in form.insumosCustos" :key="index">
        @include('admin.insumos-custo.components.form-elements-insumoCusto')
    </span>
</div>

<div v-if="!isInsumoEspecifico && !isEditPage" class="form-group row align-items-center">
    <a href="#" @click="adicionarInsumoCusto($event)" class="col-form-label offset-md-2 pb-0" :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">{{ trans('admin.insumos-custo.insumo.link.adicionar.text') }}</a>
</div>
