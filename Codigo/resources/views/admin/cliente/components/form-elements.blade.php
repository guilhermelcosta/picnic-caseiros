<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nome') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.cliente.placeholder.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sobrenome'), 'has-success': fields.sobrenome && fields.sobrenome.valid }">
    <label for="sobrenome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.sobrenome') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.sobrenome" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sobrenome'), 'form-control-success': fields.sobrenome && fields.sobrenome.valid}" id="sobrenome" name="sobrenome" placeholder="{{ trans('admin.cliente.placeholder.sobrenome') }}">
        <div v-if="errors.has('sobrenome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sobrenome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('apelido'), 'has-success': fields.apelido && fields.apelido.valid }">
    <label for="apelido" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.apelido') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.apelido" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('apelido'), 'form-control-success': fields.apelido && fields.apelido.valid}" id="apelido" name="apelido" placeholder="{{ trans('admin.cliente.placeholder.apelido') }}">
        <div v-if="errors.has('apelido')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('apelido') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('documentos_tipo_id'), 'has-success': fields.documentos_tipo_id && fields.documentos_tipo_id.valid }">
    <label for="documentos_tipo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.documentos_tipo_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <!-- <input type="text" v-model="form.documentos_tipo_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('documentos_tipo_id'), 'form-control-success': fields.documentos_tipo_id && fields.documentos_tipo_id.valid}" id="documentos_tipo_id" name="documentos_tipo_id" placeholder="{{ trans('admin.cliente.placeholder.documentos_tipo_id') }}"> -->
        <multiselect
            v-model="form.documentos_tipo_id"
            name="documentos_tipo_id"
            placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
            :options="{{ $tipos_documento }}"
            track-by="id"
            :key="form.documento_tipo_id"
            label="descricao"
            :multiple="false"
            open-direction="bottom"
        ></multiselect>
        <div v-if="errors.has('documentos_tipo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('documentos_tipo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('documento'), 'has-success': fields.documento && fields.documento.valid }">
    <label for="documento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.documento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.documento" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('documento'), 'form-control-success': fields.documento && fields.documento.valid}" id="documento" name="documento" placeholder="{{ trans('admin.cliente.placeholder.documento') }}">
        <div v-if="errors.has('documento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('documento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_aniversario'), 'has-success': fields.data_aniversario && fields.data_aniversario.valid }">
    <label for="data_aniversario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.data_aniversario') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="date" v-model="form.data_aniversario" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd'" class="flatpickr form-control" :class="{'form-control-danger': errors.has('data_aniversario'), 'form-control-success': fields.data_aniversario && fields.data_aniversario.valid}" id="data_aniversario" name="data_aniversario" placeholder="{{ trans('brackets/admin-placeholder::admin.forms.select_a_date') }}">
        <!-- <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
        <datetime v-model="form.data_aniversario" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_aniversario'), 'form-control-success': fields.data_aniversario && fields.data_aniversario.valid}" id="data_aniversario" name="data_aniversario" placeholder="{{ trans('brackets/admin-placeholder::admin.forms.select_a_date') }}"></datetime> -->
        <div v-if="errors.has('data_aniversario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_aniversario') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('endereco_id'), 'has-success': fields.endereco_id && fields.endereco_id.valid }">
    <label for="endereco_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.endereco_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.endereco_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('endereco_id'), 'form-control-success': fields.endereco_id && fields.endereco_id.valid}" id="endereco_id" name="endereco_id" placeholder="{{ trans('admin.cliente.placeholder.endereco_id') }}">
        <div v-if="errors.has('endereco_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('endereco_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao'), 'has-success': fields.observacao && fields.observacao.valid }">
    <label for="observacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.observacao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <textarea type="text" v-model="form.observacao.observacao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao'), 'form-control-success': fields.observacao && fields.observacao.valid}" id="observacao" name="observacao" placeholder="{{ trans('admin.cliente.placeholder.observacao') }}"></textarea>
        <div v-if="errors.has('observacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao') }}</div>
    </div>
</div>

@include('admin.endereco.components.form-elements', ['title' => trans('admin.cliente.columns.endereco_id')])
