<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ingrediente'), 'has-success': fields.ingrediente && fields.ingrediente.valid }">
    <label for="ingrediente" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ingrediente.columns.ingrediente') }} @{{ index + 1 }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <div class="row">
            <div class="col">
                <multiselect
                    v-model="{{ 'ingrediente.ingrediente' }}"
                    :name="'ingrediente' + index"
                    placeholder="{{ trans('admin.ingrediente.placeholder.ingrediente') }}"
                    :options="{{ $tipos_ingrediente }}"
                    track-by="id"
                    :key="{{ 'ingrediente' }}"
                    label="descricao"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
            </div>
            <div class="col-auto">
                <span type="button" class="btn btn-sm btn-danger" title="{{ trans('admin-ui.btn.delete') }}" @click="excluirIngrediente($event, index)"><i class="fa fa-trash-o"></i></span>
            </div>
        </div>
        <div v-if="errors.has('ingrediente')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ingrediente') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <div class="offset-md-2 col-md-4">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantidade'), 'has-success': fields.quantidade && fields.quantidade.valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <input type="text" v-model="{{ 'ingrediente.quantidade' }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantidade'), 'form-control-success': fields.quantidade && fields.quantidade.valid}" :id="'quantidade' + index" name="quantidade" placeholder="{{ trans('admin.ingrediente.placeholder.quantidade') }}">
                <div v-if="errors.has('quantidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade'), 'has-success': fields.unidade && fields.unidade.valid }">
            <div :class="isFormLocalized ? 'col-md-8' : 'col-md-12'">
                <multiselect
                    v-model="{{ 'ingrediente.unidade' }}"
                    name="unidade"
                    placeholder="{{ trans('admin.ingrediente.placeholder.unidade') }}"
                    :options="{{ $tipos_unidade }}"
                    track-by="value"
                    :key="form.unidade"
                    label="label"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
                <div v-if="errors.has('unidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade') }}</div>
            </div>
        </div>
    </div>
</div>
