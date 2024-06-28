import AppListing from '../app-components/Listing/AppListing';

Vue.component('canais-venda-listing', {
    mixins: [AppListing],
    methods: {
        getSymbol(unidade_comissao) {
            if (unidade_comissao == 1) {
                return "%";
            } else if (unidade_comissao == 2) {
                return "R$";
            } else {
                return "Un.";
            }
            
        },

        formatValue(value, unit) {
            if (!isNaN(value)) {
                let formattedValue = Number(value).toFixed(2).replace('.', ',');
                if (unit == 1) {
                    return formattedValue + '%';
                } else if (unit == 2) {
                    return 'R$ ' + formattedValue;
                } else {
                    return formattedValue + ' Un.';
                }
            }
            return '';
        }

    }
});