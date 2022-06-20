define([
    'jquery',
    'Genesisoft_FormsBr/js/validators/vat-id-validator',
    'underscore',
    'moment'
], function ($, cpfCnpj, _,moment) {
    'use strict';

    return function (validator) {

        // Valida CPF/CNPJ
        validator.addRule('validate-vat-id',
            function (value) {
                return cpfCnpj.validate(value);
            },
            $.mage.__("CPF/CNPJ inválido.")
        );

        // Valida CNPJ
        validator.addRule('validate-cnpj',
            function (value) {
                return cpfCnpj.validateCNPJ(value);
            },
            $.mage.__("CNPJ inválido.")
        );

        // Valida CPF
        validator.addRule('validate-cpf',
            function (value) {
                return cpfCnpj.validateCPF(value);
            },
            $.mage.__("CPF inválido.")
        );

        // Sobrescreve funções nativas do rules.js do Magento para correção de bug
        validator.addRule('min_text_length',
            function (value, params) {
                return (_.isUndefined(value) || value == null) || value.length === 0 || value.length >= +params;
            },
            $.mage.__('Please enter more or equal than {0} symbols.')
        );

        validator.addRule('max_text_length',
            function (value, params) {
                return (!_.isUndefined(value) || value != null) || value.length === 0 && value.length <= +params;
            },
            $.mage.__('Please enter less or equal than {0} symbols.')
        );

        validator.addRule('validate-dob',
            function (value, param, params) {
                if (value === '') {
                    return true;
                }
                return moment.utc(value, params.dateFormat).isSameOrBefore(moment.utc());
            },
            $.mage.__('The Date of Birth should not be greater than today.')
        );

        return validator;
    };
});

