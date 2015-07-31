"use strict"

function bubbleSort(arr){
    var len = arr.length;
    for (var i = len-1; i>=0; i--){
        for(var j = 1; j<=i; j++){

            if(arr[j-1][0] > arr[j][0]){
                var temp = arr[j-1];
                arr[j-1] = arr[j];
                arr[j] = temp;
            }
        }
    }
    return arr;
}

var Jornada = Backbone.Model.extend({

    urlRoot: '/api/jornadas',

    initialize: function(modelo, opciones) {

        this.columnas = opciones.collection.getColumnas();
        Backbone.Model.prototype.initialize.apply(this, arguments);
        this.on("change", function (modelo, opciones) {

            console.log('Entre');
            if(jQuery.isEmptyObject(opciones)){
                modelo.save();
                console.log('Grabe');
                //Actualizo el el total para ese vehiculo.
                modelo.set({ total: this.sumarTotal(this.columnas) });

            };

        });
    },

    sumarTotal:  function sumarTotal(columnas) {

        var total = 0;
        var that = this;

        columnas.map(function (columna) {

            if(columna.celda === 'dinero'){
                total += that.attributes[columna.name];
            };
        });

        return total;
    },

    parse: function(respuesta){

        //Si el tipo de respuesta es create,
        //actualizo el ID a lo que devuelve el servidor.
        return (respuesta.tipo && (respuesta.tipo =="create")) ? {"id": respuesta.jornadaID} : respuesta

    }
});

var ColeccionJornadas = Backbone.Collection.extend({

    /**
     Inicializador.
     @param {Object} opciones
     @param {string} opciones.turno
     @param {string} opciones.flotaSlug
     @param {ModuloJornadas} opciones.modulo
     @throws {ReferenceError} Si no se definen las opciones.
     */
    initialize : function(datos, opciones){

        try {

            if (opciones === undefined ) {
                throw new ReferenceError();
            }

            this.turno = opciones.turno;
            this.flota = opciones.flotaSlug;
            this.fecha = moment().format('YYYY-MM-DD');
            this.modulo = opciones.modulo;
            this.on('change', function () {
                this.modulo.aplicacion.trigger("jornadas:actualizada");
            })
        } catch (excepcion) {

            if (excepcion instanceof ReerenceError) {
                console.error('Error inicialiando una coleccion de Jornadas. No se paso el ' +
                'parametro opciones o los datos iniciales.');
                console.error('Tipo de Excepcion:' + excepcion.name);
                console.error(excepcion.message);
            }
            throw excepcion;
        }

    },
    setFecha: function (fecha) {

        this.fecha = fecha;

    },

    url: function(){

        return '/api/jornadas/' + this.flota + '/' + this.fecha + '/' + this.turno;
    },
    model: function(modelo, opciones) {
            return new Jornada(modelo, opciones);

    },
    parse: function(data) {
        this.columnas = data.columnas;
        return data.datos;
    },
    getTotales: function(){

        var totales = [];
        var that = this;
        var grandTotal = 0;
        var opciones = {
            symbol : "$",
            decimal : ",",
            thousand: ".",
            precision : 0,
            format: "%s%v"
        };


        //Recorro las columnas
        this.columnas.map(function(columna){

            //Si es de tipo dinero, la agrego
            if (columna.celda === 'dinero') {

                var valor = that.getTotal(columna.name);


                totales.push({
                    tipo: columna.label,
                    valor: valor
                });
            }

        });

        totales.map(
            function (total) {
                grandTotal += total.valor;
            }
        )
        totales.push({
            tipo: 'TOTAL',
            valor: grandTotal
        });
        totales.map(
            function (total) {
                total.valor = accounting.formatMoney(total.valor, opciones);

            }
        )

        return totales;
    },
    getTotal: function(nombre){

        var total = 0;
        this.map(function (item) {
                total += item.get(nombre);
            }
        );

        return total;
    },
    getTurno: function () {
        return this.turno;
    },
    setTurno: function (turno) {
        this.turno = turno;
    },

    getColumnas: function(){

        if (this.columnas === undefined ) {

            throw new Error("No esta seteada la propiedad columnas");
        }

        //todo ver porque entra tantas veces



        var Select2Cell = Backgrid.SelectCell.extend({

            optionValues: this.getChoferes()
        });

        this.columnas.map(function (columna) {

            if (columna.celda === "dinero") {

                columna.cell = DineroCell;

            } else if (columna.celda === "total") {

                columna.cell = TotalCell;

            } else if (columna.celda === "choferes") {

                columna.cell = Select2Cell;

            } else {
                columna.cell = NegritaCell;

            }

        });

        return this.columnas;
    },
    getChoferes: function () {

        var array, arrayInterior;

        array = [];


        $.map(listadoChoferes.values, function(value, index) {
            arrayInterior = [value ,index];
            array.push(arrayInterior);
        });
        return bubbleSort(array);

    }
});

var Total = Backbone.Model.extend({});
var ColeccionTotales = Backbone.Collection.extend({

        model: Total,
        initialize: function (datos, opciones) {
            this.modulo = opciones.modulo;
        },
        getTurno: function () {
            var turno = 'Día';
            if (this.modulo.coleccion.getTurno() === 'noche'){
                turno = 'Noche';
            } else if (this.modulo.coleccion.getTurno() === 'a-cargo'){
                turno = 'A Cargo';
            }
            return turno;

            //return this.modulo.coleccion.getTurno();

        }

    });