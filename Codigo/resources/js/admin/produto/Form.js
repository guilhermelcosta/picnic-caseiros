import AppForm from '../app-components/Form/AppForm';

Vue.component('produto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome: '',
                descricao: '',
                observacao_id: '',
                observacao: {
                    observacao: '',
                },
                estoque: '',
                itens: [{
                    quantidade: '',
                    item: '',
                    porcentagem_mao_obra: '',
                    porcentagem_lucro: ''
                }]
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
        adicionarItem(event) {
            event.preventDefault();
            this.form.itens.push({});
        },
        excluirItem(event, index) {
            event.preventDefault();
            this.form.itens.splice(index, 1);
        },
        autofill() {
            this.form.nome = 'Produto de Teste';
            this.form.descricao = 'Teste para apresentação';
            this.form.observacao_id = '';
            this.form.observacao = {
                observacao: 'Observação de teste do produto',
            };
            this.form.estoque = 2,
            this.form.itens = [
                {
                    item: {
                        created_at:"2024-04-10T20:57:29.000000Z",
                        deleted_at:null,
                        descricao:"Bolo de Banana",
                        id:2,
                        modo_preparo:"Colocar os ingredientes no liquidicador, bater tudo e assar por 5min.",
                        observacao_id:'',
                        percentual_altera_peso:null,
                        porcao:"250.00",
                        preparo_altera_peso:false,
                        rendimento:3,
                        resource_url:"http://localhost:8000/admin/receitas/2",
                        unidade_porcao:"2",
                        updated_at:"2024-04-10T20:57:29.000000Z",
                        validade_dias:null,
                    },
                    porcentagem_lucro:"50",
                    porcentagem_mao_obra:"50",
                    quantidade:"2",
                },
                {
                    item: {
                        created_at:"2024-05-08T15:34:29.000000Z",
                        deleted_at:null,
                        descricao:"Receita de teste",
                        id:5,
                        modo_preparo:"Modo de preparo de teste",
                        observacao_id:104,
                        percentual_altera_peso:null,
                        porcao:"125.00",
                        preparo_altera_peso:false,
                        rendimento:1,
                        resource_url:"http://localhost:8000/admin/receitas/5",
                        unidade_porcao:"2",
                        updated_at:"2024-05-08T16:13:26.000000Z",
                        validade_dias:null,
                    },
                    porcentagem_lucro:"50",
                    porcentagem_mao_obra:"50",
                    quantidade:"1",
                }
            ];
        }
    },
});
