"use strict"
var VistaTurnos = Marionette.ItemView.extend({

    initialize: function (opciones) {

        this.modulo = opciones.modulo;
        var configuracion = this.getConfiguracionBotones();
        this.model = new Backbone.Model( configuracion );

    },


    getConfiguracionBotones: function () {
        //Declaro la variable turnos como un objeto vacio.
        var turnos = {};

        //Obtengo la coleccion de jornadas.
        var col = this.modulo.coleccion;

        //Si el turno es Dia, devuelvo turno dia
        turnos = (col.getTurno() === 'dia') ?   this.setTurnos('Noche', 'A Cargo')
            :
            (col.getTurno() === 'noche') ? this.setTurnos('Dia', 'A Cargo')
                :this.setTurnos('Dia', 'Noche');
        return turnos;

    },

    events: {
        "click #boton-turno-a": "btnAClickHandler",
        "click #boton-turno-b": "btnBClickHandler"
    },
    template:"#turnos-template",

    btnAClickHandler: function (evento) {

        evento.preventDefault();
        this.handle('dia', 'noche');
    },

    btnBClickHandler: function (evento) {

        evento.preventDefault();
        this.handle('a-cargo', 'noche');

    },
    handle: function(turnoA, turnoB){

        //Determino como asignar turno actual.
        //Si el turno actual es dia,
        // asigno el proximo turno a la noche.
        //Si es noche o a-cargo, asigno el
        //proximo turno a noche.
        //Determino como asignar turno actual.
        //Si el turno actual es a-cargo,
        // asigno el proximo turno a la noche.
        //Si es noche o dia, asigno el
        //proximo turno a a-cargo.
        var turnoActual = this.modulo.coleccion.getTurno();
        var proximoTurno =  this.es(turnoA, turnoActual) ? turnoB : turnoA;
        this.modulo.coleccion.setTurno(proximoTurno);
        var configuracion = this.getConfiguracionBotones();
        this.model.set(configuracion);
        this.render();
        console.assert(turnoActual != proximoTurno, 'El turno anterior y el proximo no pueden ser iguales.');
        this.modulo.aplicacion.trigger('turnos:cambio', proximoTurno);


    },

    setTurnos: function (turnoA, turnoB) {

        return {
            turnoA: turnoA,
            turnoB: turnoB
        };

    },

    es: function(turno, turnoActual){
        return (turnoActual === turno);
    }

});