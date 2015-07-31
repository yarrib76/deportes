var ColeccionSemanal = Backbone.Collection.extend({

    initialize : function(datos, opciones){

        try {

            if (opciones === undefined ) {
                throw new ReferenceError();
            }

            this.flota = opciones.flotaSlug;
            this.modulo = opciones.modulo;
            this.semana = moment().format('W');

        } catch (excepcion) {

            if (excepcion instanceof ReerenceError) {
                console.error('Error inicialiando una coleccion de ReporteSemanal. No se paso el ' +
                'parametro opciones o los datos iniciales.');
                console.error('Tipo de Excepcion:' + excepcion.name);
                console.error(excepcion.message);
            }
            throw excepcion;
        }

    },

    url: function(){

        return '/api/jornadasReporteSemanal/' + this.flota + '/'+ '2015' + '/' + this.semana;
    },

    setSemanaDelMes: function (semana) {

        this.semana = semana;

    },
    getSemanaDelMes: function () {

        return parseInt( this.semana);

    },

    getTotales: function () {

        return this.totales;

    },

    parse: function(data) {

        this.totales = data.datos.totales;
        return data.datos.filas;
    }

});

var SemanaDelMesModel =  Backbone.Model.extend();

