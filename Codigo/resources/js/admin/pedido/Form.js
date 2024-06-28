import AppForm from '../app-components/Form/AppForm';

Vue.component('pedido-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cliente_id: '',
                canais_venda_id: '',
                data_confirmacao_pedido: '',
                data_entrega_prevista: '',
                data_entrega_realizada: '',
                forma_pagto_entrada_id: '',
                data_limite_entrada: '',
                porcentagem_entrada: '',
                data_pedido: '',
                valor_entrada: '',
                data_pagto_entrada: '',
                forma_pagto_restante_id: '',
                data_restante: '',
                valor_restante: '',
                observacao_id: '',
                endereco_entrega_id: '',

            }
        }
    }

});
