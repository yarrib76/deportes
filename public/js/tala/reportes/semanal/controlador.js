"use strict"

var ControladorSemanal = Marionette.Controller.extend({

    initialize: function (opciones) {

        //Referencia al modulo jornadas.
        this.modulo = opciones.modulo;
    },

    mostrarReporte: function () {

        //Region Principal.
        this.mostrarRegionPrincipal();
    },


    mostrarBarraLateral: function () {

        var semanaActual = this.modulo.coleccion.getSemanaDelMes();
        var dias = TalaFechaHelper.obtenerDias(semanaActual);


        this.modulo.modeloSemanaDelMes = new SemanaDelMesModel({
            semana: semanaActual,
            lunes: dias.lunes,
            domingo: dias.domingo
        });
        var navegador = new Navegador({
            modulo: this.modulo,
            model: this.modulo.modeloSemanaDelMes
        });
        this.modulo.aplicacion.lateral.show(navegador);
    },
    actualizarDatos: function (semana) {

        this.modulo.coleccion.setSemanaDelMes(semana);
        var m = this.modulo;
        this.modulo.coleccion.fetch({
            reset: true,
            success: function () {
                m.aplicacion.trigger("detalles:actualizado");
            }
        });
    },
    semanaMenos: function () {

        var semana = this.modulo.coleccion.getSemanaDelMes();
        semana = semana - 1;
        this.actualizarDatos(semana);
    },
    semanaMas: function () {

        var semana = this.modulo.coleccion.getSemanaDelMes();
        semana = semana + 1;
        this.actualizarDatos(semana);


    },
    actualizarTotales: function () {

        this.modulo.coleccionTotales.reset(this.modulo.coleccion.getTotales());

    },


    mostrarRegionPrincipal: function () {

        var vistaTablas = new TablasLayoutView();
        this.modulo.aplicacion.principal.show(vistaTablas);

        var vistaReporteSemanal = new VistaTablaReporteSemanal({
            columns: this.modulo.columnas,
            collection: this.modulo.coleccion,
            className: "backgrid"
        });

        this.modulo.coleccionTotales = new Backbone.Collection(this.modulo.coleccion.getTotales());
        var vistaTotalesSemanales = new VistaTablaTotalesSemanales({
            columns: this.modulo.columnas,
            collection: this.modulo.coleccionTotales,
            className: "backgrid"
        });

        vistaTablas.getRegion('turnos').show(vistaReporteSemanal);
        vistaTablas.getRegion('totales').show(vistaTotalesSemanales);

    }

});