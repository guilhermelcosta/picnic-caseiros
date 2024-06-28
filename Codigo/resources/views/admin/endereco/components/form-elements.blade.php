<div class="card-header border-0">{{ $title }}</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cep'), 'has-success': fields.cep && fields.cep.valid }">
    <label for="cep" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.cep') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-7'">
        <input type="text" v-model="form.endereco.cep" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cep'), 'form-control-success': fields.cep && fields.cep.valid}" id="cep" name="cep" placeholder="{{ trans('admin.endereco.placeholder.cep') }}">
        <div v-if="errors.has('cep')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cep') }}</div>
    </div>
    <a href="{{ trans('admin.endereco.link.find-cep.to') }}" class="col-form-label text-md-right" :class="[isFormLocalized ? 'col-md-4' : 'col-md-2', { 'pb-0': isSmallScreen }]" target="_blank">{{ trans('admin.endereco.link.find-cep.text') }}</a>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('logradouros_tipo_id'), 'has-success': fields.logradouros_tipo_id && fields.logradouros_tipo_id.valid }">
    <label for="logradouros_tipo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.logradouros_tipo_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.endereco.logradouros_tipo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('logradouros_tipo_id'), 'form-control-success': fields.logradouros_tipo_id && fields.logradouros_tipo_id.valid}" id="logradouros_tipo_id" name="logradouros_tipo_id" placeholder="{{ trans('admin.endereco.placeholder.logradouros_tipo_id') }}">
        <div v-if="errors.has('logradouros_tipo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('logradouros_tipo_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('logradouro'), 'has-success': fields.logradouro && fields.logradouro.valid }">
    <label for="logradouro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.logradouro') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.endereco.logradouro" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('logradouro'), 'form-control-success': fields.logradouro && fields.logradouro.valid}" id="logradouro" name="logradouro" placeholder="{{ trans('admin.endereco.placeholder.logradouro') }}">
        <div v-if="errors.has('logradouro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('logradouro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <div class="d-flex flex-wrap align-items-center col-md-6 px-0" :class="{ 'form-group': isSmallScreen, 'has-danger': errors.has('numero'), 'has-success': fields.numero && fields.numero.valid }">
        <label for="numero" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">{{ trans('admin.endereco.columns.numero') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-8'">
            <input type="text" v-model="form.endereco.numero" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numero'), 'form-control-success': fields.numero && fields.numero.valid}" id="numero" name="numero" placeholder="{{ trans('admin.endereco.placeholder.numero') }}">
            <div v-if="errors.has('numero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero') }}</div>
        </div>
    </div>
    <div class="d-flex flex-wrap align-items-center col-md-6 px-0" :class="{'has-danger': errors.has('complemento'), 'has-success': fields.complemento && fields.complemento.valid }">
        <label v-if="isSmallScreen" for="complemento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.endereco.columns.complemento') }}</label>
        <label v-else for="complemento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.endereco.abreviacao.complemento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-7'">
            <input type="text" v-model="form.endereco.complemento" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('complemento'), 'form-control-success': fields.complemento && fields.complemento.valid}" id="complemento" name="complemento" placeholder="{{ trans('admin.endereco.placeholder.complemento') }}">
            <div v-if="errors.has('complemento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('complemento') }}</div>
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bairro'), 'has-success': fields.bairro && fields.bairro.valid }">
    <label for="bairro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.bairro') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.endereco.bairro" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bairro'), 'form-control-success': fields.bairro && fields.bairro.valid}" id="bairro" name="bairro" placeholder="{{ trans('admin.endereco.placeholder.bairro') }}">
        <div v-if="errors.has('bairro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bairro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cidade'), 'has-success': fields.cidade && fields.cidade.valid }">
    <label for="cidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.cidade') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.endereco.cidade" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cidade'), 'form-control-success': fields.cidade && fields.cidade.valid}" id="cidade" name="cidade" placeholder="{{ trans('admin.endereco.placeholder.cidade') }}">
        <div v-if="errors.has('cidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': fields.estado && fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.endereco.estado" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': fields.estado && fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.endereco.placeholder.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pais'), 'has-success': fields.pais && fields.pais.valid }">
    <label for="pais" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.pais') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.endereco.pais" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pais'), 'form-control-success': fields.pais && fields.pais.valid}" id="pais" name="pais" placeholder="{{ trans('admin.endereco.placeholder.pais') }}">
        <div v-if="errors.has('pais')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pais') }}</div>
    </div>
</div>


