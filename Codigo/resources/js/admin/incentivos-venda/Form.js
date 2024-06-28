import AppForm from '../app-components/Form/AppForm';

Vue.component('incentivos-venda-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao: '',
                valor: '',
                unidade: '',
                maximo_moeda: '',
                inicio_vigencia: '',
                fim_vigencia: '',
                is_ativo: false ,

            }
        }
    }

});
