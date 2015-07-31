"use strict"
var ModuloJornadas = function(configuracion) {

    var datosIniciales = configuracion.datosIniciales || [];

    var modulo =  {};

    modulo.listadoChoferes = configuracion.listadoChoferes || [];


    //Si me pasaron la aplicacion la asigno, si
    //no la asigno a un nuevo objeto.
    modulo.aplicacion = configuracion.aplicacion || {};

    //Colecciones
    modulo.coleccion = new ColeccionJornadas(datosIniciales, {
        modulo: modulo,
        parse: true,
        flotaSlug: 'uru-taxis',
        turno: 'dia'
    });

    modulo.coleccionTotales = new ColeccionTotales(modulo.coleccion.getTotales(), {modulo: modulo});


    //Controlador
    modulo.controlador = new ControladorJornadas({ modulo: modulo });

    return modulo;
};
