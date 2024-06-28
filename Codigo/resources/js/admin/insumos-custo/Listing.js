import AppListing from '../app-components/Listing/AppListing';

Vue.component('insumos-custo-listing', {
    mixins: [AppListing],
    methods: {
        showModal(modal) {
            this.$modal.show("dialog", {
                title: "modal",
                text: `Construir o HTML do corpo do modal`,
                buttons: [
                    {
                        title: "botao",
                        handle: () => {
                            return;
                        },
                    },
                    // Adicione mais botões aqui, se necessário
                ],
            });
        },
        hideModal() {
            this.$modal.hide("modal");
            this.$modal.hide("dialog");
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
        },

        formatReal(value) {
            if (!isNaN(value)) {
                return 'R$ ' + Number(value).toFixed(2).replace('.', ',');
            }
            return '';
        },

        formatPercentage(value) {
            if (!isNaN(value)) {
                return Number(value).toFixed(2).replace('.', ',') + '%';
            }
            return '';
        },

        formatUnity(value) {
            if (!isNaN(value)) {
                return Number(value).toFixed(2).replace('.', ',') + ' Un.';
            }
            return '';
        },

        formatMeasure(value, unit) {
            const unitMap = {
                1: 'mg',
                2: 'g',
                3: 'kg',
                4: 'mm',
                5: 'ml',
                6: 'l',
                7: 'cm',
                8: 'm',
                9: 'Un.'
            };

            if (!isNaN(value)) {
                let formattedValue = Number(value).toFixed(2).replace('.', ',');
                return formattedValue + ' ' + (unitMap[unit] || '');
            }
            return '';
        },

        getMeasureSymbol(unit) {
            const unitMap = {
                1: 'mg',
                2: 'g',
                3: 'kg',
                4: 'mm',
                5: 'ml',
                6: 'l',
                7: 'cm',
                8: 'm',
                9: 'Un.'
            };

            return unitMap[unit] || '';
        }
    }
});
