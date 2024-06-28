import AppForm from '../app-components/Form/AppForm';

Vue.component('formas-pagamento-form', {
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
