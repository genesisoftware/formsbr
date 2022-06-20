var config = {
    config: {
        mixins: {
            'Magento_Ui/js/lib/validation/validator': {
                'Genesisoft_FormsBr/js/ui-validator-mixin': true
            },
            'mage/validation': {
                'Genesisoft_FormsBr/js/validator-mixin': true
            }
        }
    },
    deps: [
        'jquery',
        'Genesisoft_FormsBr/js/form-br',
        'Genesisoft_FormsBr/js/mask-br'
    ]
}
