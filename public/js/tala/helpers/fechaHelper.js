"use strict"
var TalaFechaHelper = (function () {
    var modulo = {};



    function obtenerDia(fecha) {

        var meses = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];


        var dia = fecha.format('D');
        var mes = fecha.format('M');
        return dia + ' de ' + meses[mes-1];

    }

    modulo.obtenerDias = function (semana) {

        var lunes = moment().week(semana);
        var strLunes = obtenerDia(lunes);

        var domingo = lunes.add(6, 'days');
        var strDomingo = obtenerDia(domingo);

        return {
            lunes: strLunes,
            domingo: strDomingo
        }

    };

    return modulo;
}());