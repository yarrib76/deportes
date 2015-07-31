//Creo una nueva aplicacion
var Reportes = new Marionette.Application({

    establecerDatosIniciales: function(datosIniciales) {

            this.datosIniciales = datosIniciales;
    }
});

//Agrego las regiones:
Reportes.addRegions({

    principal: "#region-principal",
    lateral: "#region-barra-lateral"
});

//Inicializadores
Reportes.on("before:start", function () {

    Reportes.semanal = new ModuloSemanal({
        aplicacion: Reportes,
        datosIniciales: this.datosIniciales
    });

});

Reportes.on("start", function () {
    var c = Reportes.semanal.controlador;

    c.mostrarReporte();
    c.mostrarBarraLateral();
    Reportes.on("semana:cambio:menos", function() {
        c.semanaMenos();
    });
    Reportes.on("semana:cambio:mas", function() {
        c.semanaMas();
    });
    Reportes.on("detalles:actualizado", function() {

        c.actualizarTotales();
        $('#boton-semana-menos').prop('disabled', false);
        $('#boton-semana-mas').prop('disabled', false);
    });

});




