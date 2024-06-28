<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.incentivos-venda.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.incentivos-venda.placeholder.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="valor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.incentivos-venda.columns.valor') }}</label>
    <div class="col-md-4">
        <div class="form-group row align-items-center mb-md-0" :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <input type="text" v-model="form.valor" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}" id="valor" name="valor" placeholder="{{ trans('admin.incentivos-venda.placeholder.valor') }}">
                <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row align-items-center mb-md-0" :class="{'has-danger': errors.has('unidade'), 'has-success': fields.unidade && fields.unidade.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <multiselect
                    v-model="{{ 'form.unidade' }}"
                    name="unidade"
                    placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                    :options="{{ $tipos_unidade_representativa }}"
                    track-by="value"
                    :key="form.unidade"
                    label="label"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
                <!-- <input type="text" v-model="form.unidade" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade'), 'form-control-success': fields.unidade && fields.unidade.valid}" id="unidade" name="unidade" placeholder="{{ trans('admin.incentivos-venda.placeholder.unidade') }}"> -->
                <div v-if="errors.has('unidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('maximo_moeda'), 'has-success': fields.maximo_moeda && fields.maximo_moeda.valid }">
    <label for="maximo_moeda" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.incentivos-venda.columns.maximo_moeda') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.maximo_moeda" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('maximo_moeda'), 'form-control-success': fields.maximo_moeda && fields.maximo_moeda.valid}" id="maximo_moeda" name="maximo_moeda" placeholder="{{ trans('admin.incentivos-venda.placeholder.maximo_moeda') }}">
        <div v-if="errors.has('maximo_moeda')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('maximo_moeda') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.incentivos-venda.columns.vigencias') }}</label>
    <div class="d-flex flex-wrap col-md-9">
        <div class="col-md-6 pl-md-0">
            <div class="form-group d-flex flex-wrap align-items-center mb-md-0" :class="{'has-danger': errors.has('inicio_vigencia'), 'has-success': fields.inicio_vigencia && fields.inicio_vigencia.valid }">
                <input type="date" v-model="form.inicio_vigencia" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd'" class="flatpickr form-control" :class="{'form-control-danger': errors.has('inicio_vigencia'), 'form-control-success': fields.inicio_vigencia && fields.inicio_vigencia.valid}" id="inicio_vigencia" name="inicio_vigencia" placeholder="{{ trans('brackets/admin-placeholder::admin.forms.select_a_date') }}">
                <!-- <input type="text" v-model="form.inicio_vigencia"                            v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('inicio_vigencia'), 'form-control-success': fields.inicio_vigencia && fields.inicio_vigencia.valid}" id="inicio_vigencia" name="inicio_vigencia" placeholder="{{ trans('admin.incentivos-venda.placeholder.inicio_vigencia') }}"> -->
                <div v-if="errors.has('inicio_vigencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inicio_vigencia') }}</div>
            </div>
        </div>
        <div class="col-md-6 pr-md-0">
            <div class="form-group d-flex flex-wrap align-items-center mb-md-0" :class="{'has-danger': errors.has('fim_vigencia'), 'has-success': fields.fim_vigencia && fields.fim_vigencia.valid }">
                <input type="date" v-model="form.fim_vigencia" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd'" class="flatpickr form-control" :class="{'form-control-danger': errors.has('fim_vigencia'), 'form-control-success': fields.fim_vigencia && fields.fim_vigencia.valid}" id="fim_vigencia" name="fim_vigencia" placeholder="{{ trans('brackets/admin-placeholder::admin.forms.select_a_date') }}">
                <!-- <input type="text" v-model="form.fim_vigencia" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fim_vigencia'), 'form-control-success': fields.fim_vigencia && fields.fim_vigencia.valid}" id="fim_vigencia" name="fim_vigencia" placeholder="{{ trans('admin.incentivos-venda.placeholder.fim_vigencia') }}"> -->
                <div v-if="errors.has('fim_vigencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fim_vigencia') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_ativo'), 'has-success': fields.is_ativo && fields.is_ativo.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_ativo" type="checkbox" v-model="form.is_ativo" v-validate="''" data-vv-name="is_ativo" name="is_ativo_fake_element">
        <label class="form-check-label" for="is_ativo">
            {{ trans('admin.incentivos-venda.columns.is_ativo') }}
        </label>
        <input type="hidden" name="is_ativo" :value="form.is_ativo">
        <div v-if="errors.has('is_ativo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_ativo') }}</div>
    </div>
</div>
