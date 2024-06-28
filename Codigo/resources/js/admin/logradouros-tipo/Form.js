import AppForm from '../app-components/Form/AppForm';

Vue.component('logradouros-tipo-form', {
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
