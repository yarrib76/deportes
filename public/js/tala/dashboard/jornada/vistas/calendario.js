//Calendario
Calendario = Marionette.ItemView.extend({

    initialize: function (opciones) {

        this.modulo = opciones.modulo;

    },
    events: {
        "click a#boton-dia-menos": "diaMenosHandler",
        "click a#boton-dia-mas": "diaMasHandler"
    },
    diaMenosHandler: function (evento) {

        evento.preventDefault();
        $('#boton-dia-menos').prop('disabled', true);
        fecha = this.buscarFecha().subtract(1, 'days');
        $('#fecha').datepicker('setDate', new Date(fecha));
        this.modulo.aplicacion.trigger('calendario:dia:menos', fecha.format('YYYY-MM-DD'));
    },
    //Handler para e click.
    diaMasHandler: function (evento) {

        evento.preventDefault();
        $('#boton-dia-mas').prop('disabled', true);
        fecha = this.buscarFecha().add(1, 'days');
        if(fecha.isAfter(moment())){
            fecha = moment();
        }
        $('#fecha').datepicker('setDate', new Date(fecha));
        this.modulo.aplicacion.trigger('calendario:dia:mas', fecha.format('YYYY-MM-DD'));
    },
    template: "#calendario-template",

    //Cuando se agrega al DOM.
    onAttach: function(){

        var opciones = {
            changeMonth: true,
            changeYear: true,
            dateFormat: ("DD dd 'de' MM"),
            closeText: 'Cerrar',
            prevText: '&#x3C;Ant',
            nextText: 'Sig&#x3E;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun',
                'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sm',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };

        $( "input#fecha" ).datepicker(opciones).datepicker('setDate',  new Date());

        var that = this;
        $('#fecha').on('change', function (evento) {

            var fecha = that.buscarFecha();

            if(fecha.isAfter(moment())){
                fecha = moment();
            }
            $('#fecha').datepicker('setDate', new Date(fecha));

            that.modulo.aplicacion.trigger(
                "calendario:cambio:fecha",
                fecha.format('YYYY-MM-DD'));


        });
    },
    buscarFecha: function(){

        var fecha = $('input#fecha').datepicker('getDate');
        return moment(fecha);

    }
});

