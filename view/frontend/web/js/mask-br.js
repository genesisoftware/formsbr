define([
         "jquery", "inputmasklib", "ko", "maskmoneylib"
    ],
    function($, inputmasklib, ko, maskmoneylib) {
        "use strict";

        // Configura Inputmask
        inputmasklib.extendDefaults({
            'jitMasking': true,
            'greedy': false
        });

        // Cria funções de máscaras
        ko.telephoneMask = function (obj) {
            $(obj).inputmask({
                mask: ["(99) 9999-9999", '(99) 99999-9999']
            });
        };

        ko.vatIdMask = function (obj) {
            $(obj).inputmask({
                mask: ['999.999.999-99', '99.999.999/9999-99']
            });
        };

        ko.cnpjMask = function (obj) {
            $(obj).inputmask('99.999.999/9999-99');
        };

        ko.cpfMask = function (obj) {
            $(obj).inputmask('999.999.999-99');
        };

        ko.postcodeMask = function (obj) {
            $(obj).inputmask('99999-999');
        };

        ko.dateMask = function (obj) {
            $(obj).inputmask('99/99/9999');
        };

        ko.moneyPointMask = function (obj) {
            $(obj).maskMoney({thousands:'', decimal:'.'});
        }


    });
