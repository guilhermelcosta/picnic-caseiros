import AppForm from '../app-components/Form/AppForm';

Vue.component('receitas-ingrediente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                receita_id: '',
                insumo_id: '',
                quantidade: '',
                unidade: '',

            }
        }
    }

});
