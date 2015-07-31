QUnit.test("Coleccion Jornadas tira expecion cuando no le paso ningun parametro.", function (assert) {

    expect(1);


    assert.throws(
        function () {
            var coleccion = new ColeccionJornadas();
        }
    );

});

QUnit.test("Coleccion Jornadas tira expecion cuando no le paso solo un parametro.", function (assert) {
    expect(1)

    assert.throws(
        function () {
            var collecionJornadas = new ColeccionJornadas({},{ flota: 'uru-taxis'});
        }
    );

});

QUnit.test("Colecion Jornadas, puedo obtener los totales y las columnas.", function (assert) {

    expect(2)
    //Creo una nueva coleccion de jorndas
    var collecionJornadas = new ColeccionJornadas(

        jornadasServerResponseMock,
        {
            flota: 'uru-taxis',
            parse: true

        });

    assert.deepEqual(  collecionJornadas.getTotales(), totales ,"Los totales OK" );
    assert.equal('total' ,collecionJornadas.getColumnas().pop().celda, "Las columnas OK");


});

QUnit.test("Test de la aplicacion. La aplicacion levanta bien.", function (assert) {

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
