import AppForm from '../app-components/Form/AppForm';

Vue.component('canais-venda-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao: '',
                comissao: '',
                unidade_comissao: '',
                desconto: '',
                unidade_desconto: '',

            }
        }
    }

});
