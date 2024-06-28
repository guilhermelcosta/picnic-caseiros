<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.canais-venda.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.canais-venda.placeholder.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="comissao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.canais-venda.columns.comissao') }}</label>
    <div class="col-md-4">
        <div class="form-group row align-items-center mb-md-0" :class="{'has-danger': errors.has('comissao'), 'has-success': fields.comissao && fields.comissao.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <input type="text" v-model="form.comissao" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comissao'), 'form-control-success': fields.comissao && fields.comissao.valid}" id="comissao" name="comissao" placeholder="{{ trans('admin.canais-venda.placeholder.comissao') }}">
                <div v-if="errors.has('comissao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comissao') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row align-items-center mb-md-0" :class="{'has-danger': errors.has('unidade_comissao'), 'has-success': fields.unidade_comissao && fields.unidade_comissao.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <multiselect
                    v-model="{{ 'form.unidade_comissao' }}"
                    name="unidade_comissao"
                    placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                    :options="{{ $tipos_unidade_representativa }}"
                    track-by="value"
                    :key="form.unidade_comissao"
                    label="label"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
                <!-- <input type="text" v-model="form.unidade_comissao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade_comissao'), 'form-control-success': fields.unidade_comissao && fields.unidade_comissao.valid}" id="unidade_comissao" name="unidade_comissao" placeholder="{{ trans('admin.canais-venda.placeholder.unidade_comissao') }}"> -->
                <div v-if="errors.has('unidade_comissao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade_comissao') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="desconto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.canais-venda.columns.desconto') }}</label>
    <div class="col-md-4">
        <div class="form-group row align-items-center mb-md-0" :class="{'has-danger': errors.has('desconto'), 'has-success': fields.desconto && fields.desconto.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <input type="text" v-model="form.desconto" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('desconto'), 'form-control-success': fields.desconto && fields.desconto.valid}" id="desconto" name="desconto" placeholder="{{ trans('admin.canais-venda.placeholder.desconto') }}">
                <div v-if="errors.has('desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('desconto') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row align-items-center mb-md-0" :class="{'has-danger': errors.has('unidade_desconto'), 'has-success': fields.unidade_desconto && fields.unidade_desconto.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <multiselect
                    v-model="{{ 'form.unidade_desconto' }}"
                    name="unidade_desconto"
                    placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                    :options="{{ $tipos_unidade_representativa }}"
                    track-by="value"
                    :key="form.unidade_desconto"
                    label="label"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
                <!-- <input type="text" v-model="form.unidade_desconto" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade_desconto'), 'form-control-success': fields.unidade_desconto && fields.unidade_desconto.valid}" id="unidade_desconto" name="unidade_desconto" placeholder="{{ trans('admin.canais-venda.placeholder.unidade_desconto') }}"> -->
                <div v-if="errors.has('unidade_desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade_desconto') }}</div>
            </div>
        </div>
    </div>
</div>


