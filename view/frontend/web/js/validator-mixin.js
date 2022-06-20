define([
    'jquery',
    'Genesisoft_FormsBr/js/validators/vat-id-validator',
    'underscore',
    'moment'
], function ($, cpfCnpj, _,moment) {
    'use strict';

    return function (validator) {

        // Valida CNPJ
        $.validator.addMethod('validate-cnpj',
            function (value) {
                return cpfCnpj.validateCNPJ(value);
            },
            $.mage.__("CNPJ inválido.")
        );

        // Valida CPF
        $.validator.addMethod('validate-cpf',
            function (value) {
                return cpfCnpj.validateCPF(value);
            },
            $.mage.__("CPF inválido.")
        );


        // Valida CPF/CNPJ
        $.validator.addMethod('validate-vat-id',
            function (value) {
                return cpfCnpj.validate(value);
            },
            $.mage.__("CPF/CNPJ inválido.")
        );

        $.validator.addMethod('validate-dob',
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

