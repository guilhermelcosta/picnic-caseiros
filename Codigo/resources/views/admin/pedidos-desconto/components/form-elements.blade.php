<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pedido_id'), 'has-success': fields.pedido_id && fields.pedido_id.valid }">
    <label for="pedido_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-desconto.columns.pedido_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pedido_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pedido_id'), 'form-control-success': fields.pedido_id && fields.pedido_id.valid}" id="pedido_id" name="pedido_id" placeholder="{{ trans('admin.pedidos-desconto.columns.pedido_id') }}">
        <div v-if="errors.has('pedido_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pedido_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pedidos_item_id'), 'has-success': fields.pedidos_item_id && fields.pedidos_item_id.valid }">
    <label for="pedidos_item_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-desconto.columns.pedidos_item_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pedidos_item_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pedidos_item_id'), 'form-control-success': fields.pedidos_item_id && fields.pedidos_item_id.valid}" id="pedidos_item_id" name="pedidos_item_id" placeholder="{{ trans('admin.pedidos-desconto.columns.pedidos_item_id') }}">
        <div v-if="errors.has('pedidos_item_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pedidos_item_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('desconto'), 'has-success': fields.desconto && fields.desconto.valid }">
    <label for="desconto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-desconto.columns.desconto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.desconto" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('desconto'), 'form-control-success': fields.desconto && fields.desconto.valid}" id="desconto" name="desconto" placeholder="{{ trans('admin.pedidos-desconto.columns.desconto') }}">
        <div v-if="errors.has('desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('desconto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidade_desconto'), 'has-success': fields.unidade_desconto && fields.unidade_desconto.valid }">
    <label for="unidade_desconto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-desconto.columns.unidade_desconto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidade_desconto" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidade_desconto'), 'form-control-success': fields.unidade_desconto && fields.unidade_desconto.valid}" id="unidade_desconto" name="unidade_desconto" placeholder="{{ trans('admin.pedidos-desconto.columns.unidade_desconto') }}">
        <div v-if="errors.has('unidade_desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidade_desconto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_desconto'), 'has-success': fields.valor_desconto && fields.valor_desconto.valid }">
    <label for="valor_desconto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-desconto.columns.valor_desconto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_desconto" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_desconto'), 'form-control-success': fields.valor_desconto && fields.valor_desconto.valid}" id="valor_desconto" name="valor_desconto" placeholder="{{ trans('admin.pedidos-desconto.columns.valor_desconto') }}">
        <div v-if="errors.has('valor_desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_desconto') }}</div>
    </div>
</div>


