import AppForm from '../app-components/Form/AppForm';

Vue.component('produtos-item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                produto_id: '',
                receita_id: '',
                insumo_id: '',
                quantidade: '',
                porcentagem_mao_obra: '',
                porcentagem_lucro: '',

            }
        }
    }

});
