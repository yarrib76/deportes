//Calendario
"use strict"
var Navegador = Marionette.ItemView.extend({

    initialize: function (opciones) {

        this.modulo = opciones.modulo;

    },
    "sync": "render",
    events: {
        "click a#boton-semana-menos": "semanaMenosHandler",
        "click a#boton-semana-mas": "semanaMasHandler"
    },
    actualizarModelo: function (semana, dias) {
        this.model.set({
            semana: semana,
            reset: true,
            lunes: dias.lunes,
            domingo: dias.domingo
        });
    },

    deshabilitarBoton: function (selector) {
        $(selector).prop('disabled', true);
    },

    ejecutarHandler: function (semana) {
        //Obtengo los dias Lunes y Domingo.
        var dias = TalaFechaHelper.obtenerDias(semana);
        this.actualizarModelo(semana, dias);
        this.render();
        this.deshabilitarBoton('#boton-semana-menos');
        this.deshabilitarBoton('#boton-semana-menos');
    },

    semanaMenosHandler: function (evento) {

        evento.preventDefault();
        var semana = this.modulo.coleccion.getSemanaDelMes() - 1;
        this.ejecutarHandler(semana);
        this.modulo.aplicacion.trigger('semana:cambio:menos');

    },


    semanaMasHandler: function (evento) {
        evento.preventDefault();
        var semanaMas =  this.modulo.coleccion.getSemanaDelMes() + 1;
        this.ejecutarHandler(semanaMas);
        this.modulo.aplicacion.trigger('semana:cambio:mas');

    },
    template: "#plantilla"





});

