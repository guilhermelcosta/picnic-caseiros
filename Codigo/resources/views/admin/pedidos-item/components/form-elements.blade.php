<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pedido_id'), 'has-success': fields.pedido_id && fields.pedido_id.valid }">
    <label for="pedido_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-item.columns.pedido_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pedido_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pedido_id'), 'form-control-success': fields.pedido_id && fields.pedido_id.valid}" id="pedido_id" name="pedido_id" placeholder="{{ trans('admin.pedidos-item.columns.pedido_id') }}">
        <div v-if="errors.has('pedido_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pedido_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numero_sequencial'), 'has-success': fields.numero_sequencial && fields.numero_sequencial.valid }">
    <label for="numero_sequencial" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-item.columns.numero_sequencial') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numero_sequencial" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numero_sequencial'), 'form-control-success': fields.numero_sequencial && fields.numero_sequencial.valid}" id="numero_sequencial" name="numero_sequencial" placeholder="{{ trans('admin.pedidos-item.columns.numero_sequencial') }}">
        <div v-if="errors.has('numero_sequencial')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero_sequencial') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('produto_id'), 'has-success': fields.produto_id && fields.produto_id.valid }">
    <label for="produto_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-item.columns.produto_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.produto_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('produto_id'), 'form-control-success': fields.produto_id && fields.produto_id.valid}" id="produto_id" name="produto_id" placeholder="{{ trans('admin.pedidos-item.columns.produto_id') }}">
        <div v-if="errors.has('produto_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('produto_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantidade'), 'has-success': fields.quantidade && fields.quantidade.valid }">
    <label for="quantidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-item.columns.quantidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantidade" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantidade'), 'form-control-success': fields.quantidade && fields.quantidade.valid}" id="quantidade" name="quantidade" placeholder="{{ trans('admin.pedidos-item.columns.quantidade') }}">
        <div v-if="errors.has('quantidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('preco_unitario'), 'has-success': fields.preco_unitario && fields.preco_unitario.valid }">
    <label for="preco_unitario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-item.columns.preco_unitario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.preco_unitario" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('preco_unitario'), 'form-control-success': fields.preco_unitario && fields.preco_unitario.valid}" id="preco_unitario" name="preco_unitario" placeholder="{{ trans('admin.pedidos-item.columns.preco_unitario') }}">
        <div v-if="errors.has('preco_unitario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('preco_unitario') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao_id'), 'has-success': fields.observacao_id && fields.observacao_id.valid }">
    <label for="observacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedidos-item.columns.observacao_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.observacao_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao_id'), 'form-control-success': fields.observacao_id && fields.observacao_id.valid}" id="observacao_id" name="observacao_id" placeholder="{{ trans('admin.pedidos-item.columns.observacao_id') }}">
        <div v-if="errors.has('observacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao_id') }}</div>
    </div>
</div>


