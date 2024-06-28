import AppForm from '../app-components/Form/AppForm';

Vue.component('pedidos-cancelamento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                pedido_id: '',
                pedidos_item_id: '',
                data_solicitacao: '',
                taxa_cancelamento: '',
                unidade: '',
                valor_cancelamento: '',
                valor_reembolso: '',
                data_reembolso: '',

            }
        }
    }

});
