<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fornecedor.columns.nome') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.fornecedor.placeholder.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row" :class="{'has-danger': errors.has('is_ativo'), 'has-success': fields.is_ativo && fields.is_ativo.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <div class="col">
            <input class="form-check-input" id="is_ativo" type="checkbox" v-model="form.is_ativo" v-validate="''" data-vv-name="is_ativo" name="is_ativo_fake_element">
            <label class="form-check-label mb-0" for="is_ativo">
                {{ trans('admin.fornecedor.placeholder.is_ativo') }}
            </label>
            <input type="hidden" name="is_ativo" :value="form.is_ativo">
        </div>
        <div v-if="errors.has('is_ativo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_ativo') }}</div>
    </div>
</div>

<!-- CHECK TO DELETE -->
<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('endereco_id'), 'has-success': fields.endereco_id && fields.endereco_id.valid }">
    <label for="endereco_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fornecedor.columns.endereco_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.endereco_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('endereco_id'), 'form-control-success': fields.endereco_id && fields.endereco_id.valid}" id="endereco_id" name="endereco_id" placeholder="{{ trans('admin.fornecedor.placeholder.endereco_id') }}">
        <div v-if="errors.has('endereco_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('endereco_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome_contato'), 'has-success': fields.nome_contato && fields.nome_contato.valid }">
    <label for="nome_contato" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fornecedor.columns.nome_contato') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome_contato" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome_contato'), 'form-control-success': fields.nome_contato && fields.nome_contato.valid}" id="nome_contato" name="nome_contato" placeholder="{{ trans('admin.fornecedor.placeholder.nome_contato') }}">
        <div v-if="errors.has('nome_contato')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome_contato') }}</div>
    </div>
</div>

@include('admin.contato.components.form-elements', ['index' => 0])

<!-- CHECK TO DELETE -->
<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao_id'), 'has-success': fields.observacao_id && fields.observacao_id.valid }">
    <label for="observacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fornecedor.columns.observacao_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.observacao_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao_id'), 'form-control-success': fields.observacao_id && fields.observacao_id.valid}" id="observacao_id" name="observacao_id" placeholder="{{ trans('admin.fornecedor.placeholder.observacao_id') }}">
        <div v-if="errors.has('observacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao'), 'has-success': fields.observacao && fields.observacao.valid }">
    <label for="observacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.fornecedor.columns.observacao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <textarea type="text" v-model="form.observacao.observacao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao'), 'form-control-success': fields.observacao && fields.observacao.valid}" id="observacao" name="observacao" placeholder="{{ trans('admin.fornecedor.placeholder.observacao') }}"></textarea>
        <div v-if="errors.has('observacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao') }}</div>
    </div>
</div>

@include('admin.endereco.components.form-elements', ['title' => trans('admin.fornecedor.columns.endereco_id')])
