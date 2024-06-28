import AppForm from '../app-components/Form/AppForm';

Vue.component('pedidos-desconto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                pedido_id: '',
                pedidos_item_id: '',
                desconto: '',
                unidade_desconto: '',
                valor_desconto: '',

            }
        }
    }

});
