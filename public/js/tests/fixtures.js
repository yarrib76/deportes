//Columnas a mostrar en pantalla.
var columnas = [{
    name: "chofer",
    label: "Chofer",
    celda: "string",
    editable: false

}, {
    name: "efectivo",
    label: "Efectivo",
    celda: "dinero"
},
    {
        name: "cuenta_corriente",
        label: "Cuenta Corriente",
        celda: "dinero"
    }
];

var jornadasServerResponseMock = {
    "datos":[
        {
            "id":"1171",
            "fecha":"2015-01-01",
            "movil":"1",
            "taxi_tipo_turno_id":"1",
            "taxi_id":"1",
            "chofer":"garea.e ",
            "usuario_id":"186",
            "efectivo":20,
            "deuda":20,
            "cuenta_corriente":20,
            "gastos": 20,
            "total": 20
        },
        {
            "id":"1172",
            "fecha":"2015-01-01",
            "movil":"2",
            "taxi_tipo_turno_id":"1",
            "taxi_id":"2",
            "chofer":"Fernandez",
            "usuario_id":"2",
            "efectivo":10,
            "deuda":10,
            "cuenta_corriente": 10,
            "gastos":10,
            "total":10
        }

    ],
    "tipo":"getDatos",
    "columnas": [{
        name: "chofer",
        label: "Chofer",
        celda: "string",
        editable: false

    }, {
        name: "efectivo",
        label: "Efectivo",
        celda: "dinero"
    },
        {
            name: "cuenta_corriente",
            label: "Cuenta Corriente",
            celda: "dinero"
        },
         {
            name: "total",
            label: "Total",
            celda: "total"
        }
    ]
};

//Repuesta que me debe dar la
//funcion getTotales()
var totales = [
    {
        "tipo": "Efectivo",
        "valor": "$30"
    },
    {
        "tipo": "Cuenta Corriente",
        "valor": "$30"
    },
    {
        "tipo": "TOTAL",
        "valor": "$60"
    }

];