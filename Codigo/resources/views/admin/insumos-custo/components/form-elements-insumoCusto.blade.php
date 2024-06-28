<div v-if="!isInsumoEspecifico && !isEditPage" class="card-header border-0">{{ trans('admin.insumos-custo.insumo.title') }} @{{ index + 1 }}</div>

<div v-if="!isInsumoEspecifico" class="form-group row align-items-center" :class="{'has-danger': errors.has('insumo_' + index), 'has-success': fields['insumo_' + index] && fields['insumo_' + index].valid }">
    <label :for="'insumo_' + index" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.insumo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
            <multiselect
                v-model="form.insumosCustos[index].insumo"
                :id="'insumo_' + index"
                :name="'insumo_' + index"
                placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                :options="{{ $insumos }}"
                track-by="id"
                :key="'insumo_' + index"
                label="descricao"
                :multiple="false"
                open-direction="bottom"
                :disabled="isInsumoEspecifico"
            ></multiselect>
        <div v-if="errors.has('insumo_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insumo_' + index) }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('marca_' + index), 'has-success': fields['marca_' + index] && fields['marca_' + index].valid }">
    <label :for="'marca_' + index" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.insumos_marca') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
            <multiselect
                v-model="form.insumosCustos[index].marca"
                :id="'marca_' + index"
                :name="'marca_' + index"
                placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                :options="{{ $marcas }}"
                track-by="id"
                :key="'marca_' + index"
                label="nome"
                :multiple="false"
                open-direction="bottom"
            ></multiselect>
        <div v-if="errors.has('marca_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('marca_' + index) }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fornecedor_' + index), 'has-success': fields['fornecedor_' + index] && fields['fornecedor_' + index].valid }">
    <label :for="'fornecedor_' + index" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.fornecedor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
            <multiselect
                v-model="form.insumosCustos[index].fornecedor"
                :id="'fornecedor_' + index"
                :name="'fornecedor_' + index"
                placeholder="{{ trans('admin-ui.forms.select_an_option') }}"
                :options="{{ $fornecedores }}"
                track-by="id"
                :key="'fornecedor_' + index"
                label="nome"
                :multiple="false"
                open-direction="bottom"
            ></multiselect>
        <div v-if="errors.has('fornecedor_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fornecedor_' + index) }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label :for="'quantidade_' + index" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.quantidade') }}</label>
    <div class="col-md-4">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantidade_' + index), 'has-success': fields['quantidade_' + index] && fields['quantidade_' + index].valid }">
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-12'">
                <input type="text" v-model="form.insumosCustos[index].quantidade" v-validate="'required'" @input="(event) => { validate(event); setPrecoUnitario(index); }" class="form-control" :class="{'form-control-danger': errors.has('quantidade_' + index), 'form-control-success':['fields_' + index].quantidade && fields['quantidade_' + index].valid}" :id="'quantidade' + index" :name="'quantidade_' + index" placeholder="{{ trans('admin.insumos-custo.placeholder.quantidade') }}">
                <div v-if="errors.has('quantidade_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade_' + index) }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade_' + index), 'has-success': fields['unidade_' + index] && fields['unidade_' + index].valid }">
            <div :class="isFormLocalized ? 'col-md-8' : 'col-md-12'">
                <multiselect
                    v-model="form.insumosCustos[index].unidade"
                    :id="'unidade_' + index"
                    :name="'unidade_' + index"
                    placeholder="{{ trans('admin.insumos-custo.placeholder.unidade') }}"
                    :options="{{ $tipos_unidade }}"
                    track-by="value"
                    :key="'unidade_' + index"
                    label="label"
                    :multiple="false"
                    open-direction="bottom"
                    v-validate="'required'"
                ></multiselect>
                <div v-if="errors.has('unidade_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade_' + index) }}</div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_compra_' + index), 'has-success': fields['valor_compra_' + index] && fields['valor_compra_' + index].valid }">
    <label :for="'valor_compra_' + index" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.valor_compra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.insumosCustos[index].valor_compra" v-validate="'required|decimal'" @input="(event) => { validate(event); setPrecoUnitario(index); }" class="form-control" :class="{'form-control-danger': errors.has('valor_compra_' + index), 'form-control-success': fields['valor_compra_' + index] && fields['valor_compra_' + index].valid}" :id="'valor_compra_' + index" :name="'valor_compra_' + index" placeholder="{{ trans('admin.insumos-custo.placeholder.valor_compra') }}">
        <div v-if="errors.has('valor_compra_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_compra_' + index) }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_unitario_' + index), 'has-success': fields['valor_unitario_' + index] && fields['valor_unitario_' + index].valid }">
    <label :for="'valor_unitario_' + index" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.insumos-custo.columns.valor_unitario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" disabled v-model="form.insumosCustos[index].valor_unitario" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_unitario_' + index), 'form-control-success': fields['valor_unitario_' + index] && fields['valor_unitario_' + index].valid}" :id="'valor_unitario_' + index" :name="'valor_unitario_' + index" placeholder="{{ trans('admin.insumos-custo.placeholder.valor_unitario') }}">
        <div v-if="errors.has('valor_unitario_' + index)" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_unitario_' + index) }}</div>
    </div>
</div>
