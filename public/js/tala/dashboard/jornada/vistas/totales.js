//Vista a mostrar por cada fila de la tabla totales
VistaItemTotal = Marionette.ItemView.extend({
    tagName: "tr",
    template: _.template('<td><%- tipo %></td> <td><%- valor %></td>')
});

//Tabla de totales
VistaTablaTotales = Marionette.CollectionView.extend({

    tagName: "table",
    className: "table table-striped table-hover",
    childView: VistaItemTotal,
    onBeforeRender: function(){
        this.$el.html('');
        this.$el.prepend('<h3 style="text-decoration: underline">' + 'Turno ' +this.collection.getTurno() + '</h3>');
    }
});