<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contatos-tipo.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.contatos-tipo.placeholder.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_ativo'), 'has-success': fields.is_ativo && fields.is_ativo.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_ativo" type="checkbox" v-model="form.is_ativo" v-validate="''" data-vv-name="is_ativo" name="is_ativo_fake_element">
        <label class="form-check-label" for="is_ativo">
            {{ trans('admin.contatos-tipo.placeholder.is_ativo') }}
        </label>
        <input type="hidden" name="is_ativo" :value="form.is_ativo">
        <div v-if="errors.has('is_ativo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_ativo') }}</div>
    </div>
</div>


