define([
    'jquery',
    'underscore',
    'moment',
    'mage/translate'
], function ($, _,moment) {
    'use strict';

    return function (validator) {
        var validators = {
            'validate-dob': [
                function (value, param, params) {
                    if (value === '') {
                    return true;
                  }
                    return moment.utc(value, params.dateFormat).isSameOrBefore(moment.utc());
                },
                $.mage.__('The Date of Birth should not be greater than today.')
            ]
        };
       validators = _.mapObject(validators, function (data) {
           return {
               handler: data[0],
               message: data[1]
           };
       });

        return $.extend(validator,validators);
    };
});
