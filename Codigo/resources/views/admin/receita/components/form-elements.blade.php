<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receita.columns.descricao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.receita.placeholder.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('modo_preparo'), 'has-success': fields.modo_preparo && fields.modo_preparo.valid }">
    <label for="modo_preparo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receita.columns.modo_preparo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <textarea v-model="form.modo_preparo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('modo_preparo'), 'form-control-success': fields.modo_preparo && fields.modo_preparo.valid}" id="modo_preparo" name="modo_preparo" placeholder="{{ trans('admin.receita.placeholder.modo_preparo') }}"></textarea>
        <div v-if="errors.has('modo_preparo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('modo_preparo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <div class="col-md-2">
        <div class="form-group row align-items-center" :class="{ 'mb-0': isSmallScreen, 'has-danger': errors.has('rendimento'), 'has-success': fields.rendimento && fields.rendimento.valid }">
            <label for="rendimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-12' : 'col-md-12'">{{ trans('admin.receita.columns.rendimento') }}</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('porcao'), 'has-success': fields.porcao && fields.porcao.valid }">
            <div :class="[{ 'form-group': isSmallScreen }, isFormLocalized ? 'col-md-4' : 'col-md-4']">
                <input type="text" v-model="form.rendimento" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rendimento'), 'form-control-success': fields.rendimento && fields.rendimento.valid}" id="rendimento" name="rendimento" placeholder="{{ trans('admin.receita.placeholder.rendimento') }}">
                <div v-if="errors.has('rendimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rendimento') }}</div>
            </div>
            <label class="col-form-label" :class="{ 'd-none': isSmallScreen }">x</label>
            <div class="col">
                <input type="text" v-model="form.porcao" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('porcao'), 'form-control-success': fields.porcao && fields.porcao.valid}" id="porcao" name="porcao" placeholder="{{ trans('admin.receita.placeholder.porcao') }}">
                <div v-if="errors.has('porcao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('porcao') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade_porcao'), 'has-success': fields.unidade_porcao && fields.unidade_porcao.valid }">
            <div :class="isFormLocalized ? 'col-md-12' : 'col-md-12'">
                <multiselect
                    v-model="form.unidade_porcao"
                    name="unidade_porcao"
                    placeholder="{{ trans('admin.receita.placeholder.unidade_porcao') }}"
                    :options="{{ $tipos_unidade }}"
                    track-by="value"
                    :key="form.unidade_porcao"
                    label="label"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                />
                <div v-if="errors.has('unidade_porcao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade_porcao') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('validade_dias'), 'has-success': fields.validade_dias && fields.validade_dias.valid }">
    <label for="validade_dias" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receita.columns.validade_dias') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.validade_dias" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('validade_dias'), 'form-control-success': fields.validade_dias && fields.validade_dias.valid}" id="validade_dias" name="validade_dias" placeholder="{{ trans('admin.receita.placeholder.validade_dias') }}">
        <div v-if="errors.has('validade_dias')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('validade_dias') }}</div>
    </div>
</div>

<div class="form-group row" :class="{'has-danger': errors.has('preparo_altera_peso'), 'has-success': fields.preparo_altera_peso && fields.preparo_altera_peso.valid }">
    <div class="offset-md-2 d-flex flex-wrap" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
        <div class="col-md-5">
            <input class="form-check-input" id="preparo_altera_peso" type="checkbox" v-model="form.preparo_altera_peso" v-validate="''" data-vv-name="preparo_altera_peso" name="preparo_altera_peso_fake_element">
            <label class="form-check-label mb-0" for="preparo_altera_peso">
                {{ trans('admin.receita.placeholder.preparo_altera_peso') }}
            </label>
            <input type="hidden" name="preparo_altera_peso" :value="form.preparo_altera_peso">
        </div>
        <div v-if="errors.has('preparo_altera_peso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('preparo_altera_peso') }}</div>
        <div v-if="form.preparo_altera_peso" class="col-md-7 pr-md-0">
            <div class="form-group row align-items-center justify-content-end" :class="{'has-danger': errors.has('percentual_altera_peso'), 'has-success': fields.percentual_altera_peso && fields.percentual_altera_peso.valid }">
                <label for="percentual_altera_peso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-7'">{{ trans('admin.receita.columns.percentual_altera_peso') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">
                    <input type="text" v-model="form.percentual_altera_peso" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('percentual_altera_peso'), 'form-control-success': fields.percentual_altera_peso && fields.percentual_altera_peso.valid}" id="percentual_altera_peso" name="percentual_altera_peso" placeholder="{{ trans('admin.receita.placeholder.percentual_altera_peso') }}">
                    <div v-if="errors.has('percentual_altera_peso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('percentual_altera_peso') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao_id'), 'has-success': fields.observacao_id && fields.observacao_id.valid }">
    <label for="observacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receita.columns.observacao_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <textarea v-model="form.observacao.observacao" v-validate="" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao_id'), 'form-control-success': fields.observacao_id && fields.observacao_id.valid}" id="observacao_id" name="observacao_id" placeholder="{{ trans('admin.receita.placeholder.observacao_id') }}"></textarea>
        <div v-if="errors.has('observacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao_id') }}</div>
    </div>
</div>

<div class="card-header border-0">{{ trans('admin.ingrediente.actions.index') }}</div>

<div>
    <span v-for="(ingrediente, index) in form.ingredientes" :key="index">
        @include('admin.receita.components.form-elements-ingredientes')
    </span>
</div>

<div class="form-group row align-items-center">
    <a href="#" @click="adicionarIngrediente($event)" class="col-form-label offset-md-2 pb-0" :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">{{ trans('admin.ingrediente.link.adicionar.text') }}</a>
</div>
