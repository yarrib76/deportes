//Tabla principal de jornadas
VistaTablaJornadas = Backgrid.Grid.extend({});

//Celdas
DineroCell = Backgrid.NumberCell.extend({
    editor: Backgrid.InputCellEditor.extend({

        //Selecciono el Texto cuando se ingresa en la celda
        postRender: function (model, column) {
            this.$el.focus().select();
            return this;
        }
    })
});

TotalCell = Backgrid.NumberCell.extend({className: "total-cell negrita"});
var NegritaCell = Backgrid.StringCell.extend({className: "string-cell negrita"});




