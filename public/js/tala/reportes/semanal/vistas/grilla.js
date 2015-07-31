var TablasLayoutView = Marionette.LayoutView.extend({
    template: "#tablas-template",

    regions: {
        turnos: "#turnos",
        totales: "#totales"
    }
});

var DineroFormatter = _.extend({}, Backgrid.CellFormatter.prototype, {

    fromRaw: function (rawValue, model) {

        var opciones = {
            symbol : "",
            decimal : ",",
            thousand: ".",
            precision : 0,
            format: "%s%v"
        };
        return accounting.formatMoney(rawValue, opciones);
    }
});

var DineroCell = Backgrid.StringCell.extend({
    // every cell class has a default formatter, which you can override
    formatter: DineroFormatter
});

var TotalFormatter = _.extend({}, Backgrid.CellFormatter.prototype, {

    fromRaw: function (rawValue, model) {

        var opciones = {
            symbol : "$",
            decimal : ",",
            thousand: ".",
            precision : 0,
            format: "%s%v"
        };
        return accounting.formatMoney(rawValue, opciones);
    }
});

var TotalCell = Backgrid.StringCell.extend({
    // every cell class has a default formatter, which you can override
    formatter: TotalFormatter,
    className: "string-cell negrita"

});

var VistaTablaReporteSemanal = Backgrid.Grid.extend();
var VistaTablaTotalesSemanales = Backgrid.Grid.extend();
var NegritaCell = Backgrid.StringCell.extend({className: "string-cell negrita"});