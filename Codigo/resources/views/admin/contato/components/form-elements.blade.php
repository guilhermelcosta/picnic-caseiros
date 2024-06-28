<!-- CHECK TO DELETE -->
<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('fornecedor_id'), 'has-success': fields.fornecedor_id && fields.fornecedor_id.valid }">
    <label for="fornecedor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contato.columns.fornecedor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fornecedor_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fornecedor_id'), 'form-control-success': fields.fornecedor_id && fields.fornecedor_id.valid}" id="fornecedor_id" name="fornecedor_id" placeholder="{{ trans('admin.contato.columns.fornecedor_id') }}">
        <div v-if="errors.has('fornecedor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fornecedor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_id'), 'has-success': fields.cliente_id && fields.cliente_id.valid }">
    <label for="cliente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contato.columns.cliente_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_id'), 'form-control-success': fields.cliente_id && fields.cliente_id.valid}" id="cliente_id" name="cliente_id" placeholder="{{ trans('admin.contato.columns.cliente_id') }}">
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center">
    <div class="d-flex flex-wrap align-items-center col-md-6 px-0" :class="{ 'form-group': isSmallScreen, 'has-danger': errors.has('contato'), 'has-success': fields.contato && fields.contato.valid }">
        <label for="contato" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">{{ trans('admin.contato.columns.contato') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-8'">
            <input type="text" v-model="{{ 'form.contatos[' . $index . '].contato' }}" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contato'), 'form-control-success': fields.contato && fields.contato.valid}" id="contato" name="contato" placeholder="{{ trans('admin.contato.placeholder.contato') }}">
            <div v-if="errors.has('contato')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contato') }}</div>
        </div>
    </div>

    <!-- CHECK TO DELETE -->
    <!-- <div class="d-flex flex-wrap align-items-center col-md-6 px-0" :class="{'has-danger': errors.has('contatos_tipo_id'), 'has-success': fields.contatos_tipo_id && fields.contatos_tipo_id.valid }">
        <label for="contatos_tipo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">{{ trans('admin.contato.columns.contatos_tipo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-10'">
            <input type="text" :v-model="{{ 'form.contatos[' . $index . '].contato_tipo_id' }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contatos_tipo_id'), 'form-control-success': fields.contatos_tipo_id && fields.contatos_tipo_id.valid}" id="contatos_tipo_id" name="contatos_tipo_id" placeholder="{{ trans('admin.contato.columns.contatos_tipo_id') }}">
            <div v-if="errors.has('contatos_tipo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contatos_tipo_id') }}</div>
        </div>
    </div> -->

    <div class="d-flex flex-wrap align-items-center col-md-6 px-0" :class="{'has-danger': errors.has('documentos_tipo_id'), 'has-success': fields.documentos_tipo_id && fields.documentos_tipo_id.valid }">
        <!-- <label for="documentos_tipo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.documentos_tipo_id') }}</label> -->
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-10'">
            <!-- <input type="text" v-model="form.documentos_tipo_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('documentos_tipo_id'), 'form-control-success': fields.documentos_tipo_id && fields.documentos_tipo_id.valid}" id="documentos_tipo_id" name="documentos_tipo_id" placeholder="{{ trans('admin.cliente.columns.documentos_tipo_id') }}"> -->
            <multiselect
                v-model="{{ 'form.contatos[' . $index . '].contato_tipo_id' }}"
                name="contatos_tipo_id"
                placeholder="{{ trans('admin.contato.placeholder.contato_tipo_id') }}"
                :options="{{ $tipos_contato }}"
                track-by="id"
                :key="{{ 'form.contatos[' . $index . '].contato_tipo_id' }}"
                label="descricao"
                :multiple="false"
                open-direction="bottom"
                />
                <!-- @input="updateTipoDocumentoSelected" -->
            <div v-if="errors.has('contatos_tipo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contatos_tipo_id') }}</div>
        </div>
    </div>
</div>
