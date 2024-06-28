<div class="form-group row align-items-center" :class="{'has-danger': errors.has('item'), 'has-success': fields.item && fields.item.valid }">
    <label for="item" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.item') }} @{{ index + 1 }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <div class="row">
            <div :class="[{ 'form-group': isSmallScreen }, isFormLocalized ? 'col-md-4' : 'col-md-4']">
                <input type="text" v-model="item.quantidade" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantidade'), 'form-control-success': fields.quantidade && fields.quantidade.valid}" :id="'quantidade' + index" :name="'quantidade' + index" placeholder="{{ trans('admin.produtos-item.placeholder.quantidade') }}">
                <div v-if="errors.has('quantidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade') }}</div>
            </div>
            <label class="col-form-label" :class="{ 'd-none': isSmallScreen }">x</label>
            <div class="col">
                <multiselect
                    v-model="{{ 'item.item' }}"
                    :name="'item' + index"
                    placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                    :options="{{ $tipos_item }}"
                    track-by="id"
                    :key="{{ 'item' }}"
                    label="descricao"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
            </div>
            <div class="col-auto">
                <span type="button" class="btn btn-sm btn-danger" title="{{ trans('admin-ui.btn.delete') }}" @click="excluirItem($event, index)"><i class="fa fa-trash-o"></i></span>
            </div>
        </div>
        <div v-if="errors.has('item')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('item') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produtos-item.columns.porcentagens') }}</label>
    <div class="d-flex flex-wrap col-md-9">
        <div class="col-md-6 pl-md-0">
            <div class="form-group d-flex flex-wrap align-items-center" :class="{'has-danger': errors.has('porcentagem_mao_obra'), 'has-success': fields.porcentagem_mao_obra && fields.porcentagem_mao_obra.valid }">
                <input type="text" v-model="item.porcentagem_mao_obra" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('porcentagem_mao_obra'), 'form-control-success': fields.porcentagem_mao_obra && fields.porcentagem_mao_obra.valid}" id="porcentagem_mao_obra" name="porcentagem_mao_obra" placeholder="{{ trans('admin.produtos-item.placeholder.porcentagem_mao_obra') }}">
                <div v-if="errors.has('porcentagem_mao_obra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('porcentagem_mao_obra') }}</div>
            </div>
        </div>
        <div class="col-md-6 pr-md-0">
            <div class="form-group d-flex flex-wrap align-items-center" :class="{'has-danger': errors.has('porcentagem_lucro'), 'has-success': fields.porcentagem_lucro && fields.porcentagem_lucro.valid }">
                <input type="text" v-model="item.porcentagem_lucro" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('porcentagem_lucro'), 'form-control-success': fields.porcentagem_lucro && fields.porcentagem_lucro.valid}" id="porcentagem_lucro" name="porcentagem_lucro" placeholder="{{ trans('admin.produtos-item.placeholder.porcentagem_lucro') }}">
                <div v-if="errors.has('porcentagem_lucro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('porcentagem_lucro') }}</div>
            </div>
        </div>
    </div>
</div>
