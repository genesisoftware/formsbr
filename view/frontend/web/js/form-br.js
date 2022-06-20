define([
        "jquery", "ko", "mage/url"
    ],
    function ($, ko, url) {
        "use strict";

        ko.postcodeJs = function (obj) {
            $(obj).on('change', function () {
                    // Finalizou digitação do CEP
                    if (this.value.length == 9) {
                        $.ajax({
                            url: url.build('formsbr/autocomplete/index'),
                            data: {postcode: this.value},
                            type: 'post',
                            dataType: 'json',
                            context: this
                        })
                            .done(function (response) {
                                $('input[name="street\[0\]"]').val(response['logradouro']).change();
                                $('input[name="street\[2\]"]').val(response['bairro']).change();
                                $('input[name="city"]').val(response['cidade']).change();
                                $('select[name="region_id"]').val(response['uf_id']).change();
                            })
                            .fail(function (error) {
                                console.log(JSON.stringify(error));
                            });
                    }
                }
            );
            ko.postcodeMask($(obj));
        };
    });