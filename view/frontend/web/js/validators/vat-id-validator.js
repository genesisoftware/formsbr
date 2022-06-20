define(function () {
    return {
        validate: function (value) {

            var s = (value).replace(/\D/g, '');
            var tam = (s).length; // removendo os caracteres não numéricos
            if (!(tam == 11 || tam == 14)) { // validando o tamanho
                return false;
            }
            // se for CPF
            if (tam == 11) {
                if (!this.validateCPF(s)) { // chama a função que valida o CPF
                    return false;
                }
                return true;
            }
            // se for CNPJ
            if (tam == 14) {
                if (!this.validateCNPJ(s)) { // chama a função que valida o CNPJ
                    return false;
                }
                return true;
            }
        },
        validateCPF: function (s) {
            s = (s).replace(/\D/g, ''); // Garantindo remoção de não numéricos
            var c = s.substr(0, 9);
            var dv = s.substr(9, 2);
            var d1 = 0;
            for (var i = 0; i < 9; i++) {
                d1 += c.charAt(i) * (10 - i);
            }
            if (d1 == 0) return false;
            d1 = 11 - (d1 % 11);
            if (d1 > 9) d1 = 0;
            if (dv.charAt(0) != d1) {
                return false;
            }
            d1 *= 2;
            for (var i = 0; i < 9; i++) {
                d1 += c.charAt(i) * (11 - i);
            }
            d1 = 11 - (d1 % 11);
            if (d1 > 9) d1 = 0;
            if (dv.charAt(1) != d1) {
                return false;
            }
            return true;
        },
        validateCNPJ: function (s) {
            s = (s).replace(/\D/g, ''); // Garantindo remoção de não numéricos
            var a = new Array();
            var b = new Number;
            var c = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
            for (i = 0; i < 12; i++) {
                a[i] = s.charAt(i);
                b += a[i] * c[i + 1];
            }
            if ((x = b % 11) < 2) {
                a[12] = 0
            } else {
                a[12] = 11 - x
            }
            b = 0;
            for (y = 0; y < 13; y++) {
                b += (a[y] * c[y]);
            }
            if ((x = b % 11) < 2) {
                a[13] = 0;
            } else {
                a[13] = 11 - x;
            }
            if ((s.charAt(12) != a[12]) || (s.charAt(13) != a[13])) {
                return false;
            }
            return true;
        }

    };
});