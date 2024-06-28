import AppForm from '../app-components/Form/AppForm';

Vue.component('produtos-custos-incentivos-venda-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                incentivos_venda_id: '',
                produtos_custo_id: '',

            }
        }
    }

});
