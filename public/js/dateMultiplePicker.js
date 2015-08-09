$(document).ready(function(){
    $('#datePick').multiDatesPicker();

    $(document).ready(function(){

        $("input").click(function(){
            var names = this.value;
            var jsonfied = {
                names: names.replace( /,$/, "" ).split(",").map(function(name) {
                    return {name: name};
                })
            };
           this.value =  diaSemana(jsonfied);
        });

    });

    function diaSemana (dias)
    {
        var x;
        var cont = 0;
        var diasConvertidos = [];
        for (x in dias['names']) {
            if (dias['names'][x]['name']) {
                var d = new Date(dias['names'][x]['name']);
                var weekday = new Array(7);
                weekday[0] = "Domingo";
                weekday[1] = "Lunes";
                weekday[2] = "Martes";
                weekday[3] = "Miercoles";
                weekday[4] = "Jueves";
                weekday[5] = "Viernes";
                weekday[6] = "Sabado";

                var n = weekday[d.getDay()];
                diasConvertidos[cont] = n
                cont++;
            }
        }
        return(diasConvertidos);
    };
});