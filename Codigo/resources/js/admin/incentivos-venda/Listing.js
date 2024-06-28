import AppListing from '../app-components/Listing/AppListing';

Vue.component('incentivos-venda-listing', {
    mixins: [AppListing],
    methods: {
        getSymbol(value) {
            if (value == 1) {
                return "%";
            } else if (value == 2) {
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