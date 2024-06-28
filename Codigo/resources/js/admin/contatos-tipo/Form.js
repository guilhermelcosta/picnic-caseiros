import AppForm from '../app-components/Form/AppForm';

Vue.component('contatos-tipo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao: '',
                is_ativo: false ,

            }
        }
    }

});
