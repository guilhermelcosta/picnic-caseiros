import AppForm from '../app-components/Form/AppForm';
import { buscarInformacoes } from '../endereco/Form';

Vue.component('cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome: '',
                sobrenome: '',
                apelido: '',
                documento: '',
                documentos_tipo_id: '',
                data_aniversario: '',
                endereco_id: '',
                endereco: {
                    logradouro: '',
                    numero: '',
                    complemento: '',
                    bairro: '',
                    cidade: '',
                    estado: '',
                    pais: '',
                    cep: '',
                },
                observacao_id: '',
                observacao: {
                    observacao: '',
                },
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
            this.form.nome = 'Teste';
            this.form.sobrenome = 'Sobrenome Teste';
            this.form.apelido = 'Apelido teste';
            this.form.documento = '';
            this.form.documentos_tipo_id = '';
            this.form.data_aniversario = '2000-01-01';
            this.form.endereco_id = '';
            this.form.endereco = {
                logradouro: 'Rua dos Bobos',
                numero: '0',
                complemento: 'Casa engraçada',
                bairro: 'Bairro teste',
                cidade: 'Belo Horizonte',
                estado: 'Minas Gerais',
                pais: 'Brasil',
                cep: '31000000',
            },
            this.form.observacao_id = '';
            this.form.observacao = {
                observacao: 'Observacao de teste',
            };
        }
    },
    watch: {
        async 'form.endereco.cep'(newValue) {
            if (newValue !== undefined && newValue.length === 8) {
                let endereco = await buscarInformacoes(newValue);
                if (endereco) {
                    this.form.endereco = {...this.form.endereco, ...endereco};
                }
            }
        }
    }
});
