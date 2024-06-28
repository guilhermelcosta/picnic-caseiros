import AppForm from '../app-components/Form/AppForm'
import { buscarInformacoes } from '../endereco/Form'

Vue.component('fornecedor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome: '',
                nome_contato: '',
                contatos: [{
                    contato: '',
                    contato_tipo_id: '',
                }],
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
                is_ativo: false ,
            },
            isSmallScreen: false,
        }
    },
    created() {
        this.checkScreenSize()
        window.addEventListener('resize', this.checkScreenSize)
    },
    destroyed() {
        window.removeEventListener('resize', this.checkScreenSize)
    },
    methods: {
        checkScreenSize() {
            this.isSmallScreen = window.innerWidth < 768
        }
    },
    watch: {
        async 'form.endereco.cep'(newValue) {
            if (newValue !== undefined && newValue.length === 8) {
                let endereco = await buscarInformacoes(newValue)
                if (endereco) {
                    this.form.endereco = {...this.form.endereco, ...endereco}
                }
            }
        }
    }
})
