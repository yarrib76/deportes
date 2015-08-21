
$(document).ready(function() {

/* initialize the calendar
 -----------------------------------------------------------------*/
    var tipoConsulta = 'actividadAsignada';
    var id = 2;
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },

    events: '/api/agenda?' + tipoConsulta + '_id=' + id,
    eventRender: function (event, element, view) {
        if (event.allDay === 'true') {
            event.allDay = true;
        } else {
            event.allDay = false;
        }
    }
});
});