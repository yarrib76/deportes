
$(document).ready(function() {
    calendar(id);

    $("#usuario").change(function(evento){
        var id=document.getElementById("usuario").value;
        calendar(id);
    });

function calendar(id) {
    /* initialize the calendar
     -----------------------------------------------------------------*/
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        }
    });
    $.ajax({
        type: "GET",
        url: '/api/agendaProfesores?',
        data: tipoConsulta + '_id=' + id + '&' + 'profesor_id' + '=' + profesor_id,
            success: function(events)
            {
                $('#calendar').fullCalendar('removeEvents');
                $('#calendar').fullCalendar('addEventSource', events);
                $('#calendar').fullCalendar('rerenderEvents' );
            }
        });
}
});
