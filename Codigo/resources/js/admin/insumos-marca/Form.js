import AppForm from '../app-components/Form/AppForm';

Vue.component('insumos-marca-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome: '',
                is_ativo: false ,

            }
        }
    }

});
