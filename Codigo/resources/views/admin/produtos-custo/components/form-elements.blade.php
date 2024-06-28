<div class="form-group row align-items-center" :class="{'has-danger': errors.has('produto'), 'has-success': fields.produto && fields.produto.valid }">
    <label for="produto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custo.columns.produto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <div class="row">
            <div class="col">
                <multiselect
                    id="produto"
                    v-model="form.produto"
                    name="produto"
                    placeholder="{{ trans('admin.produtos-custo.placeholder.produto') }}"
                    :options="{{ $produtos }}"
                    track-by="id"
                    :key="form.produto"
                    label="nome"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
            </div>
        </div>
        <div v-if="errors.has('produto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('produto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('canal_venda'), 'has-success': fields.canal_venda && fields.canal_venda.valid }">
    <label for="canal_venda" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custo.columns.canais_venda') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <div class="row">
            <div class="col">
                <multiselect
                    id="canal_venda"
                    v-model="form.canal_venda"
                    name="canal_venda"
                    placeholder="{{ trans('admin.produtos-custo.placeholder.canais_venda') }}"
                    :options="{{ $canais_venda }}"
                    track-by="id"
                    :key="form.canal_venda"
                    label="descricao"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
            </div>
        </div>
        <div v-if="errors.has('canal_venda')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('canal_venda') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('inicio_vigencia'), 'has-success': fields.inicio_vigencia && fields.inicio_vigencia.valid }">
    <label for="inicio_vigencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custo.columns.inicio_vigencia') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.inicio_vigencia" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('inicio_vigencia'), 'form-control-success': fields.inicio_vigencia && fields.inicio_vigencia.valid}" id="inicio_vigencia" name="inicio_vigencia" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('inicio_vigencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inicio_vigencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fim_vigencia'), 'has-success': fields.fim_vigencia && fields.fim_vigencia.valid }">
    <label for="fim_vigencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custo.columns.fim_vigencia') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fim_vigencia" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fim_vigencia'), 'form-control-success': fields.fim_vigencia && fields.fim_vigencia.valid}" id="fim_vigencia" name="fim_vigencia" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('fim_vigencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fim_vigencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_custo'), 'has-success': fields.valor_custo && fields.valor_custo.valid }">
    <label for="valor_custo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custo.columns.valor_custo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.valor_custo" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_custo'), 'form-control-success': fields.valor_custo && fields.valor_custo.valid}" id="valor_custo" name="valor_custo" placeholder="{{ trans('admin.produtos-custo.placeholder.valor_custo') }}">
        <div v-if="errors.has('valor_custo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_custo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_venda'), 'has-success': fields.valor_venda && fields.valor_venda.valid }">
    <label for="valor_venda" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-custo.columns.valor_venda') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.valor_venda" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_venda'), 'form-control-success': fields.valor_venda && fields.valor_venda.valid}" id="valor_venda" name="valor_venda" placeholder="{{ trans('admin.produtos-custo.placeholder.valor_venda') }}">
        <div v-if="errors.has('valor_venda')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_venda') }}</div>
    </div>
</div>


