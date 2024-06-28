import AppForm from '../app-components/Form/AppForm';

Vue.component('contato-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                fornecedor_id: '',
                cliente_id: '',
                contatos_tipo_id: '',
                contato: '',

            }
        }
    }

});
