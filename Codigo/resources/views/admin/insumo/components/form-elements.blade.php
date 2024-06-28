<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.insumo.placeholder.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row" :class="{'has-danger': errors.has('is_ativo'), 'has-success': fields.is_ativo && fields.is_ativo.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <div class="col">
            <input class="form-check-input" id="is_ativo" type="checkbox" v-model="form.is_ativo" v-validate="''" data-vv-name="is_ativo" name="is_ativo_fake_element">
            <label class="form-check-label mb-0" for="is_ativo">
                {{ trans('admin.insumo.placeholder.is_ativo') }}
            </label>
            <input type="hidden" name="is_ativo" :value="form.is_ativo">
        </div>
        <div v-if="errors.has('is_ativo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_ativo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade_referencia'), 'has-success': fields.unidade_referencia && fields.unidade_referencia.valid }">
    <label v-if="isSmallScreen" for="unidade_referencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.columns.unidade_referencia') }}</label>
    <label v-else for="unidade_referencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.abreviacao.unidade_referencia') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.unidade_referencia"
            name="unidade_referencia"
            placeholder="{{ trans('admin.insumo.placeholder.unidade_referencia') }}"
            :options="{{ $tipos_unidade }}"
            track-by="value"
            :key="form.unidade_referencia"
            label="label"
            :multiple="false"
            open-direction="bottom"
            v-validate="'required'"
        />
        <div v-if="errors.has('unidade_referencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade_referencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('percentual_desperdicio'), 'has-success': fields.percentual_desperdicio && fields.percentual_desperdicio.valid }">
    <label v-if="isSmallScreen" for="percentual_desperdicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.columns.percentual_desperdicio') }}</label>
    <label v-else for="percentual_desperdicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.abreviacao.percentual_desperdicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.percentual_desperdicio" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('percentual_desperdicio'), 'form-control-success': fields.percentual_desperdicio && fields.percentual_desperdicio.valid}" id="percentual_desperdicio" name="percentual_desperdicio" placeholder="{{ trans('admin.insumo.placeholder.percentual_desperdicio') }}">
        <div v-if="errors.has('percentual_desperdicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('percentual_desperdicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('preco_pos_desperdicio'), 'has-success': fields.preco_pos_desperdicio && fields.preco_pos_desperdicio.valid }">
    <label for="preco_pos_desperdicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.columns.preco_pos_desperdicio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.preco_pos_desperdicio" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('preco_pos_desperdicio'), 'form-control-success': fields.preco_pos_desperdicio && fields.preco_pos_desperdicio.valid}" id="preco_pos_desperdicio" name="preco_pos_desperdicio" placeholder="{{ trans('admin.insumo.placeholder.preco_pos_desperdicio') }}">
        <div v-if="errors.has('preco_pos_desperdicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('preco_pos_desperdicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao'), 'has-success': fields.observacao && fields.observacao.valid }">
    <label for="observacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumo.columns.observacao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <textarea type="text" v-model="form.observacao.observacao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao'), 'form-control-success': fields.observacao && fields.observacao.valid}" id="observacao" name="observacao" placeholder="{{ trans('admin.insumo.placeholder.observacao') }}"></textarea>
        <div v-if="errors.has('observacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao') }}</div>
    </div>
</div>
