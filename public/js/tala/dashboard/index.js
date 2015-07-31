"use strict"
//Creo una nueva aplicacion
var Dashboard = new Marionette.Application({

    setDatosIniciales: function(datosIniciales) {

        this.datosIniciales = datosIniciales;
    },
    setChoferes: function(listadoChoferes) {

        this.listadoChoferes = listadoChoferes;
    }

});

//Agrego las regiones:
Dashboard.addRegions({

    principal: "#region-principal",
    lateral: "#region-barra-lateral",
    sidebar: "#region-sidebar"

});

//Inicializadores
Dashboard.on("before:start", function () {

    Dashboard.jornada = new ModuloJornadas({
        aplicacion: Dashboard,
        datosIniciales: this.datosIniciales,
        listadoChoferes: this.listadoChoferes
    });
});


Dashboard.on("start", function () {

    var c = Dashboard.jornada.controlador;

    c.mostrarJornadas();
    c.cambiarURLExportar( this.jornada.coleccion.flota, moment().format('YYYY-MM-DD'));

    Dashboard.on("jornadas:actualizada", function() {
       c.actualizarTotales();
        $('#boton-dia-menos').prop('disabled', false);
        $('#boton-dia-mas').prop('disabled', false);

    });

    //Escucho cambios en el calendario.
    Dashboard.on("calendario:cambio:fecha", function(fecha) {
        c.cambiarFechaEnLaColeccion(fecha);
    });

    //Escucho cambios en el boton dia menos.
    Dashboard.on("calendario:dia:menos", function(fecha) {
        c.cambiarFechaEnLaColeccion(fecha);
    });

    //Escucho cambios en el boton dia mas.
    Dashboard.on("calendario:dia:mas", function(fecha) {
        c.cambiarFechaEnLaColeccion(fecha);
    });

    Dashboard.on("turnos:cambio", function(turno) {
        c.cambiarElTituloDeTotalesYActualizarColeccion(turno);
    });


});




