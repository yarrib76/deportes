QUnit.test("Ingreso Rapido", function (assert) {

    expect(1);
    //var collecionJornadas = new Jornadas({

        //flota: 'uru-taxis'
    //});

    assert.throws(
        function () {
            var coleccion = new ColeccionJornadas();
        }
    );

    //collecionJornadas.reset(jornadasServerResponseMock, {parse: true});
    //assert.deepEqual(  collecionJornadas.getTotales(), totales ,"Los totales OK" );
    //assert.deepEqual(  collecionJornadas.getColumnas(), columnas ,"Las columnas OK" );





});

QUnit.test("Otro  Test", function (assert) {
    expect(1)

    assert.throws(
        function () {

            var collecionJornadas = new ColeccionJornadas({},{ flota: 'uru-taxis'});
        }
    );

});

QUnit.test("Mas  Test", function (assert) {

    expect(2)
    var collecionJornadas = new ColeccionJornadas(

        jornadasServerResponseMock,
        {
            flota: 'uru-taxis',
            parse: true

        });

    assert.deepEqual(  collecionJornadas.getTotales(), totales ,"Los totales OK" );
    assert.equal('total' ,collecionJornadas.getColumnas().pop().celda, "Las columnas OK");


});

QUnit.test("Test de la aplicacion", function (assert) {

    expect(1)
    var TestApp = new Marionette.Application({
        setDatosIniciales: function(datos) {
            this.datosIniciales = datos;
        }

    });

    TestApp.setDatosIniciales(jornadasServerResponseMock);



    TestApp.on("before:start", function () {



        TestApp.jornada = new ModuloJornadas({
            aplicacion: Dashboard,
            datosIniciales: this.datosIniciales
        });
    });

    TestApp.start();
    assert.equal('Fernandez' , TestApp.jornada.coleccion.pop().get('chofer'));


});
