//Vista contenedora de la barra lateral izquierda.
var SideBarLayoutView = Marionette.LayoutView.extend({

    template: "#sidebar-template",

    regions: {
        navegacion: "#navegacion",
        exportar: "#exportar",
        totales: "#totales"
    }
});

//Vista contenedora de la seccion de navegacion superior.
NavegacionLayout = Marionette.LayoutView.extend({

    template: "#navegacion-template",
    regions: {
        calendario: "#calendario",
        turnos: "#turnos"
    }

});
