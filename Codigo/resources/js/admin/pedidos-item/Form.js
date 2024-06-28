import AppForm from '../app-components/Form/AppForm';

Vue.component('pedidos-item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                pedido_id: '',
                numero_sequencial: '',
                produto_id: '',
                quantidade: '',
                preco_unitario: '',
                observacao_id: '',

            }
        }
    }

});
