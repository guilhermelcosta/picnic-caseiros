import AppForm from '../app-components/Form/AppForm';

Vue.component('insumos-custo-form', {
    mixins: [AppForm],
    props: ['insumo'],
    data: function() {
        return {
            form: {
                data_compra: '',
                insumosCustos: [{
                    insumo: '',
                    marca: '',
                    fornecedor: '',
                    quantidade: '',
                    unidade: '',
                    valor_compra: '',
                    valor_unitario: '',
                    is_atual:  false ,
                }],
            },
            isInsumoEspecifico: false,
            isEditPage: false,
        }
    },
    created() {
        if (this.insumo) {
            this.form.insumosCustos[0].insumo = this.insumo;
            this.isInsumoEspecifico = true;
        }
        if (window.location.pathname.includes('/edit')) {
            this.isEditPage = true;
        }
    },
    methods: {
        setPrecoUnitario(index) {
            if (this.form.insumosCustos[index].quantidade && this.form.insumosCustos[index].valor_compra) {
                this.form.insumosCustos[index].valor_unitario = this.form.insumosCustos[index].valor_compra / this.form.insumosCustos[index].quantidade;
            } else {
                this.form.insumosCustos[index].valor_unitario = '';
            }
        },
        adicionarInsumoCusto(event) {
            event.preventDefault();
            this.form.insumosCustos.push({
                insumo: '',
                marca: '',
                fornecedor: '',
                quantidade: '',
                unidade: '',
                valor_compra: '',
                valor_unitario: '',
                is_atual: false,
            });
        },
        excluirInsumoCusto(event, index) {
            event.preventDefault();
            this.form.insumosCustos.splice(index, 1);
        },
    }
});
