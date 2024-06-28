<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pedido_id'), 'has-success': fields.pedido_id && fields.pedido_id.valid }">
    <label for="pedido_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.pedido_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pedido_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pedido_id'), 'form-control-success': fields.pedido_id && fields.pedido_id.valid}" id="pedido_id" name="pedido_id" placeholder="{{ trans('admin.pedidos-cancelamento.columns.pedido_id') }}">
        <div v-if="errors.has('pedido_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pedido_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pedidos_item_id'), 'has-success': fields.pedidos_item_id && fields.pedidos_item_id.valid }">
    <label for="pedidos_item_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.pedidos_item_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pedidos_item_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pedidos_item_id'), 'form-control-success': fields.pedidos_item_id && fields.pedidos_item_id.valid}" id="pedidos_item_id" name="pedidos_item_id" placeholder="{{ trans('admin.pedidos-cancelamento.columns.pedidos_item_id') }}">
        <div v-if="errors.has('pedidos_item_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pedidos_item_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_solicitacao'), 'has-success': fields.data_solicitacao && fields.data_solicitacao.valid }">
    <label for="data_solicitacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.data_solicitacao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.data_solicitacao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('data_solicitacao'), 'form-control-success': fields.data_solicitacao && fields.data_solicitacao.valid}" id="data_solicitacao" name="data_solicitacao" placeholder="{{ trans('admin.pedidos-cancelamento.columns.data_solicitacao') }}">
        <div v-if="errors.has('data_solicitacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_solicitacao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('taxa_cancelamento'), 'has-success': fields.taxa_cancelamento && fields.taxa_cancelamento.valid }">
    <label for="taxa_cancelamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.taxa_cancelamento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.taxa_cancelamento" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('taxa_cancelamento'), 'form-control-success': fields.taxa_cancelamento && fields.taxa_cancelamento.valid}" id="taxa_cancelamento" name="taxa_cancelamento" placeholder="{{ trans('admin.pedidos-cancelamento.columns.taxa_cancelamento') }}">
        <div v-if="errors.has('taxa_cancelamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('taxa_cancelamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade'), 'has-success': fields.unidade && fields.unidade.valid }">
    <label for="unidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.unidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidade" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade'), 'form-control-success': fields.unidade && fields.unidade.valid}" id="unidade" name="unidade" placeholder="{{ trans('admin.pedidos-cancelamento.columns.unidade') }}">
        <div v-if="errors.has('unidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_cancelamento'), 'has-success': fields.valor_cancelamento && fields.valor_cancelamento.valid }">
    <label for="valor_cancelamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.valor_cancelamento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_cancelamento" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_cancelamento'), 'form-control-success': fields.valor_cancelamento && fields.valor_cancelamento.valid}" id="valor_cancelamento" name="valor_cancelamento" placeholder="{{ trans('admin.pedidos-cancelamento.columns.valor_cancelamento') }}">
        <div v-if="errors.has('valor_cancelamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_cancelamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_reembolso'), 'has-success': fields.valor_reembolso && fields.valor_reembolso.valid }">
    <label for="valor_reembolso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.valor_reembolso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_reembolso" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_reembolso'), 'form-control-success': fields.valor_reembolso && fields.valor_reembolso.valid}" id="valor_reembolso" name="valor_reembolso" placeholder="{{ trans('admin.pedidos-cancelamento.columns.valor_reembolso') }}">
        <div v-if="errors.has('valor_reembolso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_reembolso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_reembolso'), 'has-success': fields.data_reembolso && fields.data_reembolso.valid }">
    <label for="data_reembolso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-cancelamento.columns.data_reembolso') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_reembolso" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_reembolso'), 'form-control-success': fields.data_reembolso && fields.data_reembolso.valid}" id="data_reembolso" name="data_reembolso" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_reembolso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_reembolso') }}</div>
    </div>
</div>


