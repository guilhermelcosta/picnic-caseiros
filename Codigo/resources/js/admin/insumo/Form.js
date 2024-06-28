import AppForm from '../app-components/Form/AppForm';

Vue.component('insumo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao: '',
                percentual_desperdicio: '',
                unidade_referencia: '',
                preco_pos_desperdicio: '',
                is_ativo: false ,
                observacao_id: '',
                observacao: {
                    observacao: '',
                }
            },
            isSmallScreen: false,
        }
    },
    created() {
        this.checkScreenSize();
        window.addEventListener('resize', this.checkScreenSize);
    },
    destroyed() {
        window.removeEventListener('resize', this.checkScreenSize);
    },
    methods: {
        checkScreenSize() {
            this.isSmallScreen = window.innerWidth < 768;
        },
        autofill() {
            this.form.descricao = 'Insumo de teste',
            this.form.percentual_desperdicio = '',
            this.form.unidade_referencia = {
                label:"g (grama)",
                name:"GRAMA",
                value:2,
            },
            this.form.preco_pos_desperdicio = '2.00',
            this.form.is_ativo = true,
            this.form.observacao_id = '',
            this.form.observacao = {
                observacao: 'Observação de teste do insumo',
            }
        }
    },
});
