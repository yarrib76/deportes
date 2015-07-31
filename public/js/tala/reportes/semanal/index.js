"use strict";
var ModuloSemanal = function(configuracion) {

    var datosIniciales, modulo, columnas;

    columnas = [
        {
            name: "turno",
            label: "Turno",
            cell: NegritaCell,
            editable: false
        },
        {
            name: "concepto",
            label: "Concepto",
            cell: NegritaCell,
            editable: false
        },
        {
            name: "lunes",
            label: "Lunes",
            cell: DineroCell,
            editable: false
        },
        {
            name: "martes",
            label: "Martes",
            cell: DineroCell,
            editable: false
        },
        {
            name: "miercoles",
            label: "Miercoles",
            cell: DineroCell,
            editable: false
        },
        {
            name: "jueves",
            label: "Jueves",
            cell: DineroCell,
            editable: false
        },
        {
            name: "viernes",
            label: "Viernes",
            cell: DineroCell,
            editable: false
        },
        {
            name: "sabado",
            label: "Sabado",
            cell: DineroCell,
            editable: false
        },
        {
            name: "domingo",
            label: "Domingo",
            cell: DineroCell,
            editable: false
        },
        {
            name: "total",
            label: "Total",
            cell: TotalCell,
            editable: false
        },

    ];



    datosIniciales = configuracion.datosIniciales || [];
    modulo =  {};
    modulo.columnas = columnas;


    //Si me pasaron la aplicacion la asigno, si
    //no la asigno a un nuevo objeto.
    modulo.aplicacion = configuracion.aplicacion || {};


    //Colecciones
    modulo.coleccion = new ColeccionSemanal(datosIniciales, {
        modulo: modulo,
        parse: true,
        flotaSlug: 'uru-taxis',
        semanaDelMes: 1
    });

    //Colecciones
    modulo.coleccionTotales = {};

    //Controlador
    modulo.controlador = new ControladorSemanal({ modulo: modulo });

    return modulo;
};
