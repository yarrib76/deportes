
$(document).ready(function() {
    console.log(actividadAsignada_id);
/* initialize the external events
 -----------------------------------------------------------------*/

$('#external-events .fc-event').each(function () {

// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
// it doesn't need to have a start or end
    var eventObject = {
        title: $.trim($(this).text()), // use the element's text as the event title
        url: $.trim($(this).attr('url'))
    };

// store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject);

// make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true, // will cause the event to go back to its
        revertDuration: 0 // original position after the drag
    });

});


/* initialize the calendar
 -----------------------------------------------------------------*/

$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    events: '/api/agenda?' + 'actividadAsignada_id=' + actividadAsignada_id,
    eventRender: function (event, element, view) {
        if (event.allDay === 'true') {
            event.allDay = true;
        } else {
            event.allDay = false;
        }
    },
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar !!!

    drop: function (date, allDay) { // this function is called when something is dropped
// retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

// assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
// render the event on the calendar
// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

// is the "remove after drop" checkbox checked?
//if ($('#drop-remove').is(':checked')) {
// if so, remove the element from the "Draggable Events" list
//$(this).remove();
//}
        if (copiedEventObject.title) {
            var title = copiedEventObject.title;
            if (title) {
                var start = moment(copiedEventObject.start).format('YYYY-MM-DD');
                var end = moment(end).format('YYYY-MM-DDTHH:mm:ssZ');
                var url = copiedEventObject.url;
                if (title === "Recuperar") {
                    var color = '#C20000';
                }
                else
                if (title === "Recuperado"){
                    var color = '#006600';
                }
                $.ajax({
                    url: '/agenda',
                    data: 'title=' + title + '&start=' + start + '&end=' + start
                    + '&url=' + url + '&color=' + color + '&actividadAsignada_id=' + actividadAsignada_id,
                    type: "POST",
                    success: function (json) {
                        alert('Se Agrego Correctamente');
                    }
                });
            }
            window.location.reload('calendar'); //avoid update failure after drop
        }
    },

    //Eliminar un Evento del Calendario
    eventClick: function(event) {
        var decision = confirm("Esta seguro de eliminar este Evento");
        if (decision) {
            $.ajax({
                type: "DELETE",
                url: '/agenda/' + event.id,
                data: "&id=" + event.id
            });
            $('#calendar2').fullCalendar('removeEvents', event.id);
            window.location.reload('calendar'); //avoid update failure after drop
        } else {
        }
    }
});


});