<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produto.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.produto.placeholder.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produto.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.descricao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.produto.placeholder.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estoque'), 'has-success': fields.estoque && fields.estoque.valid }">
    <label for="estoque" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produto.columns.estoque') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <input type="text" v-model="form.estoque" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estoque'), 'form-control-success': fields.estoque && fields.estoque.valid}" id="estoque" name="estoque" placeholder="{{ trans('admin.produto.placeholder.estoque') }}">
        <div v-if="errors.has('estoque')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estoque') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao_id'), 'has-success': fields.observacao_id && fields.observacao_id.valid }">
    <label for="observacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.produto.columns.observacao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9'">
        <textarea v-model="form.observacao.observacao" v-validate="" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao_id'), 'form-control-success': fields.observacao_id && fields.observacao_id.valid}" id="observacao_id" name="observacao_id" placeholder="{{ trans('admin.produto.placeholder.observacao') }}"></textarea>
        <div v-if="errors.has('observacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao_id') }}</div>
    </div>
</div>

<div class="card-header border-0">{{ trans('admin.produtos-item.actions.index') }}</div>

<div>
    <span v-for="(item, index) in form.itens" :key="index">
        @include('admin.produto.components.form-elements-itens')
    </span>
</div>

<div class="form-group row align-items-center">
    <a href="#" @click="adicionarItem($event)" class="col-form-label offset-md-2 pb-0" :class="isFormLocalized ? 'col-md-4' : 'col-md-4'">{{ trans('admin.produtos-item.link.adicionar.text') }}</a>
</div>
