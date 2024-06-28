import AppForm from '../app-components/Form/AppForm';

Vue.component('produtos-custo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                produto: '',
                produto_id: '',
                canal_venda: '',
                canais_venda_id: '',
                inicio_vigencia: '',
                fim_vigencia: '',
                valor_custo: '',
                valor_venda: '',

            }
        }
    },
    watch: {
        'form.produto'(newValue) {
            if (newValue) {
                $.ajax({
                    url: '/admin/produtos-custos/calcula-custo/' + newValue.id,
                    type: 'GET',
                    dataType: 'json',
                    success: (data) => {
                        if (data) {
                            this.form.valor_custo = data;
                        } else {
                            console.log('Erro no resultado do custo');
                        }
                    },
                    error: function() {
                        console.log('Erro ao calcular o custo');
                        this.form.valor_custo = '';
                    }
                });
            } else {
                this.form.valor_custo = '';
            }
        }
    }

});
