<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_id'), 'has-success': fields.cliente_id && fields.cliente_id.valid }">
    <label for="cliente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.cliente_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_id'), 'form-control-success': fields.cliente_id && fields.cliente_id.valid}" id="cliente_id" name="cliente_id" placeholder="{{ trans('admin.pedido.columns.cliente_id') }}">
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('canais_venda_id'), 'has-success': fields.canais_venda_id && fields.canais_venda_id.valid }">
    <label for="canais_venda_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.canais_venda_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.canais_venda_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('canais_venda_id'), 'form-control-success': fields.canais_venda_id && fields.canais_venda_id.valid}" id="canais_venda_id" name="canais_venda_id" placeholder="{{ trans('admin.pedido.columns.canais_venda_id') }}">
        <div v-if="errors.has('canais_venda_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('canais_venda_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_confirmacao_pedido'), 'has-success': fields.data_confirmacao_pedido && fields.data_confirmacao_pedido.valid }">
    <label for="data_confirmacao_pedido" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_confirmacao_pedido') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_confirmacao_pedido" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_confirmacao_pedido'), 'form-control-success': fields.data_confirmacao_pedido && fields.data_confirmacao_pedido.valid}" id="data_confirmacao_pedido" name="data_confirmacao_pedido" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_confirmacao_pedido')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_confirmacao_pedido') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_entrega_prevista'), 'has-success': fields.data_entrega_prevista && fields.data_entrega_prevista.valid }">
    <label for="data_entrega_prevista" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_entrega_prevista') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_entrega_prevista" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_entrega_prevista'), 'form-control-success': fields.data_entrega_prevista && fields.data_entrega_prevista.valid}" id="data_entrega_prevista" name="data_entrega_prevista" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_entrega_prevista')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_entrega_prevista') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_entrega_realizada'), 'has-success': fields.data_entrega_realizada && fields.data_entrega_realizada.valid }">
    <label for="data_entrega_realizada" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_entrega_realizada') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_entrega_realizada" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_entrega_realizada'), 'form-control-success': fields.data_entrega_realizada && fields.data_entrega_realizada.valid}" id="data_entrega_realizada" name="data_entrega_realizada" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_entrega_realizada')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_entrega_realizada') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('forma_pagto_entrada_id'), 'has-success': fields.forma_pagto_entrada_id && fields.forma_pagto_entrada_id.valid }">
    <label for="forma_pagto_entrada_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.forma_pagto_entrada_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.forma_pagto_entrada_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('forma_pagto_entrada_id'), 'form-control-success': fields.forma_pagto_entrada_id && fields.forma_pagto_entrada_id.valid}" id="forma_pagto_entrada_id" name="forma_pagto_entrada_id" placeholder="{{ trans('admin.pedido.columns.forma_pagto_entrada_id') }}">
        <div v-if="errors.has('forma_pagto_entrada_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('forma_pagto_entrada_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_limite_entrada'), 'has-success': fields.data_limite_entrada && fields.data_limite_entrada.valid }">
    <label for="data_limite_entrada" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_limite_entrada') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_limite_entrada" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_limite_entrada'), 'form-control-success': fields.data_limite_entrada && fields.data_limite_entrada.valid}" id="data_limite_entrada" name="data_limite_entrada" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_limite_entrada')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_limite_entrada') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('porcentagem_entrada'), 'has-success': fields.porcentagem_entrada && fields.porcentagem_entrada.valid }">
    <label for="porcentagem_entrada" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.porcentagem_entrada') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.porcentagem_entrada" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('porcentagem_entrada'), 'form-control-success': fields.porcentagem_entrada && fields.porcentagem_entrada.valid}" id="porcentagem_entrada" name="porcentagem_entrada" placeholder="{{ trans('admin.pedido.columns.porcentagem_entrada') }}">
        <div v-if="errors.has('porcentagem_entrada')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('porcentagem_entrada') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_pedido'), 'has-success': fields.data_pedido && fields.data_pedido.valid }">
    <label for="data_pedido" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_pedido') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_pedido" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_pedido'), 'form-control-success': fields.data_pedido && fields.data_pedido.valid}" id="data_pedido" name="data_pedido" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_pedido')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_pedido') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_entrada'), 'has-success': fields.valor_entrada && fields.valor_entrada.valid }">
    <label for="valor_entrada" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.valor_entrada') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_entrada" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_entrada'), 'form-control-success': fields.valor_entrada && fields.valor_entrada.valid}" id="valor_entrada" name="valor_entrada" placeholder="{{ trans('admin.pedido.columns.valor_entrada') }}">
        <div v-if="errors.has('valor_entrada')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_entrada') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_pagto_entrada'), 'has-success': fields.data_pagto_entrada && fields.data_pagto_entrada.valid }">
    <label for="data_pagto_entrada" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_pagto_entrada') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_pagto_entrada" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_pagto_entrada'), 'form-control-success': fields.data_pagto_entrada && fields.data_pagto_entrada.valid}" id="data_pagto_entrada" name="data_pagto_entrada" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_pagto_entrada')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_pagto_entrada') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('forma_pagto_restante_id'), 'has-success': fields.forma_pagto_restante_id && fields.forma_pagto_restante_id.valid }">
    <label for="forma_pagto_restante_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.forma_pagto_restante_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.forma_pagto_restante_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('forma_pagto_restante_id'), 'form-control-success': fields.forma_pagto_restante_id && fields.forma_pagto_restante_id.valid}" id="forma_pagto_restante_id" name="forma_pagto_restante_id" placeholder="{{ trans('admin.pedido.columns.forma_pagto_restante_id') }}">
        <div v-if="errors.has('forma_pagto_restante_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('forma_pagto_restante_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_restante'), 'has-success': fields.data_restante && fields.data_restante.valid }">
    <label for="data_restante" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.data_restante') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_restante" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_restante'), 'form-control-success': fields.data_restante && fields.data_restante.valid}" id="data_restante" name="data_restante" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_restante')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_restante') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_restante'), 'has-success': fields.valor_restante && fields.valor_restante.valid }">
    <label for="valor_restante" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.valor_restante') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_restante" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_restante'), 'form-control-success': fields.valor_restante && fields.valor_restante.valid}" id="valor_restante" name="valor_restante" placeholder="{{ trans('admin.pedido.columns.valor_restante') }}">
        <div v-if="errors.has('valor_restante')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_restante') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao_id'), 'has-success': fields.observacao_id && fields.observacao_id.valid }">
    <label for="observacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.observacao_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.observacao_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao_id'), 'form-control-success': fields.observacao_id && fields.observacao_id.valid}" id="observacao_id" name="observacao_id" placeholder="{{ trans('admin.pedido.columns.observacao_id') }}">
        <div v-if="errors.has('observacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('endereco_entrega_id'), 'has-success': fields.endereco_entrega_id && fields.endereco_entrega_id.valid }">
    <label for="endereco_entrega_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.endereco_entrega_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.endereco_entrega_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('endereco_entrega_id'), 'form-control-success': fields.endereco_entrega_id && fields.endereco_entrega_id.valid}" id="endereco_entrega_id" name="endereco_entrega_id" placeholder="{{ trans('admin.pedido.columns.endereco_entrega_id') }}">
        <div v-if="errors.has('endereco_entrega_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('endereco_entrega_id') }}</div>
    </div>
</div>


