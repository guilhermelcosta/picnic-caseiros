import AppForm from '../app-components/Form/AppForm';

Vue.component('receita-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao: [],
                modo_preparo: '',
                rendimento: '',
                porcao: '',
                unidade_porcao: '',
                preparo_altera_peso: false ,
                percentual_altera_peso: '',
                observacao_id: '',
                observacao: {
                    observacao: '',
                },
                ingredientes: [{
                    ingrediente: '',
                    quantidade: '',
                    unidade: '',
                }],
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
        adicionarIngrediente(event) {
            event.preventDefault();
            this.form.ingredientes.push({ ingrediente: '', quantidade: '', unidade: '' });
        },
        excluirIngrediente(event, index) {
            event.preventDefault();
            this.form.ingredientes.splice(index, 1);
        },
        autofill() {
            this.form.descricao = 'Receita de teste';
            this.form.modo_preparo = 'Modo de preparo de teste';
            this.form.rendimento = 1;
            this.form.porcao = 200;
            this.form.unidade_porcao = {
                label:"g (grama)",
                name:"GRAMA",
                value:2
            };
            this.form.preparo_altera_peso = false ;
            this.form.percentual_altera_peso = '';
            this.form.observacao_id = '';
            this.form.observacao = {
                observacao: 'Observação de teste',
            },
            this.form.ingredientes = [{
                ingrediente: {
                    created_at:"2024-05-29T05:16:02.000000Z",
                    descricao:"Granola",
                    id:11,
                    is_ativo:true,
                    observacao_id:135,
                    percentual_desperdicio:"5.00",
                    preco_pos_desperdicio:"40.00",
                    quantidade_referencia:"1.00",
                    resource_url:"http://localhost:8000/admin/insumos/11",
                    unidade_referencia:"2",
                    updated_at:"2024-05-29T05:16:02.000000Z",
                },
                quantidade:"100",
                unidade: {
                    label:"g (grama)",
                    name:"GRAMA",
                    value:2
                },
            }];
        }
    },
});
