//Tabla de totales
VistaExportar = Marionette.ItemView.extend({

    template: "#exportar-template",
    initialize: function (opciones) {

        this.modulo = opciones.modulo;

    },
    events: {
        "click #boton-exportar": "btnExportarClickHandler"
    },
    btnExportarClickHandler: function (par) {
        this.modulo.aplicacion.trigger('exportar');
    }

});
