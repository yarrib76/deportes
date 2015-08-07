"use strict";

$(document).ready(function () {
    console.log($('#marcas').val());
    buscarDatosYCargarSelect('versiones', 'modelos');
    buscarDatosYCargarSelect('modelos', 'marcas');
});

/**
 Inicializa el proceso de buscar los datos en el servidor y
 cargar el select.

 @param {string} nombreElemento
 @param {string} nombreCategoria
 */
function buscarDatosYCargarSelect(nombreElemento, nombreCategoria) {

    var selectItems, selectCategoria;

    selectItems = $('#' + nombreElemento);
    selectCategoria = $('#' + nombreCategoria);

    selectCategoria.change(function (evento) {
        selectItems.empty();
        selectItems.prop('disabled', false);
        buscarColeccion(nombreElemento, selectItems, this);
    });
}

/**
 * Busca los datos en el servidor.
 * @param url Porcion variable de la url.
 * @param select Elemento HTML
 * @param objeto Elemento de donde tomo el valor
 */
function buscarColeccion(url, select, objeto) {

    var categoria_id;

    categoria_id = $(objeto).val();
    $.ajax({
        type: 'get',
        url: '/api/' + url,
        data: 'categoria_id=' + categoria_id,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (datos) {
            agregarColeccionAlSelect(select, datos);
        },
        error: function (datos) {
            console.log("Error" + datos);
        }

    });
}

/**
 @param {HTMLElement} select El elemento al que le agrego los items.
 @param {object} item El item a agregar.
 */

function agregarItemAlSelect(select, item) {
    select.append('<option value=' + item['id'] + '>' + item['nombre'] + '</option>');
}

function agregarColeccionAlSelect(select, datos) {
    datos.map(function (item) {
        agregarItemAlSelect(select, item);
    });
    select.change();
}



