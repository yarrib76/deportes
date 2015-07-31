var ControladorJornadas = Marionette.Controller.extend({

    initialize : function(opciones){

        //Referencia al modulo jornadas.
        this.modulo = opciones.modulo;
    },

    mostrarJornadas: function () {

        //Region Principal.
        this.mostrarRegionPrincipal();

        //Region Sidebar
        this.mostrarBarraLateral();

    },

    actualizarTotales: function(){

        //Actualizo la coleccion de totales.
        this.modulo.coleccionTotales.reset(
            this.modulo.coleccion.getTotales()
        );
    },

    cambiarFechaEnLaColeccion: function(fecha){

        //Actualizo fecha.
        this.modulo.coleccion.setFecha(fecha);
        var that = this;

        //Busco datos en el servidor.
        this.modulo.coleccion.fetch({
            reset: true,
            success: function () {
                that.modulo.aplicacion.trigger("jornadas:actualizada");
            }
        });

        this.cambiarURLExportar(this.modulo.coleccion.flota,  fecha);
    },

    cambiarURLExportar: function(flota , fecha){

        //Modifico el boton Exportar.
        $("#boton-exportar").attr(
            "href","/taxis/" + flota + "/exportar?fecha=" + fecha
        );
    },

    cambiarElTituloDeTotalesYActualizarColeccion: function(){

        this.actualizarColeccion();
    },

    mostrarRegionPrincipal: function () {

        var vistaJornadas = new  VistaTablaJornadas({
            columns: this.modulo.coleccion.getColumnas(),
            collection: this.modulo.coleccion,
            className: "backgrid"
        });
        this.modulo.aplicacion.principal.show(vistaJornadas);
    },
    mostrarBarraLateral: function () {

        var vistaSidebar, vistaTotales, vistaExportar, navegacion;

        //Creo el layout
        vistaSidebar = new SideBarLayoutView();
        this.modulo.aplicacion.sidebar.show(vistaSidebar);

        //Creo la vista de la tabla de totales
        vistaTotales = new VistaTablaTotales({
            collection: this.modulo.coleccionTotales
        });
        vistaSidebar.totales.show(vistaTotales);

        //Creo el layout de la seccion de navegacion.
        navegacion = new NavegacionLayout()
        vistaSidebar.navegacion.show(navegacion);

        //Agrego el calendario.
        navegacion.calendario.show(new Calendario({
            modulo: this.modulo
        }));

        //Agrego los turnos.
        navegacion.turnos.show(new VistaTurnos({
            modulo: this.modulo
        }));

        //Creo la vista exportar.
        vistaExportar = new VistaExportar({
            modulo: this.modulo
        });
        vistaSidebar.exportar.show(vistaExportar);

    },
    actualizarColeccion: function () {

        var app = this.modulo.aplicacion;
        //Busco datos en el servidor.
        this.modulo.coleccion.fetch({
            reset: true,
            success: function () {
                app.trigger("jornadas:actualizada")

            }
        });

    }

});