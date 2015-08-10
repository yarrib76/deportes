@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>

            <div id='external-events'>
                <h4>Actividad para: {{$deportista->usuario->name}}</h4>
                <div class='fc-event'>{{$actividadAsignada->actividad->nombre}}</div>
                <div class='fc-event'>Recuperar</div>
                <div class='fc-event'>Recuperado</div>

                <p>
                    <input type='checkbox' id='drop-remove' />
                    <label for='drop-remove'>remove after drop</label>
                </p>
            </div>

            <div id='calendar'></div>

            <div style='clear:both'></div>

        </div>
    </div>
@stop
@section('extra-javascript')
    <link href='/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='/fullcalendar/lib/moment.min.js'></script>
    <script src='/fullcalendar/lib/jquery.min.js'></script>
    <script src='/fullcalendar/lib/jquery-ui.custom.min.js'></script>
    <script src='/fullcalendar/fullcalendar.min.js'></script>
    <script src='/fullcalendar/lang/es.js'></script>

    <script>
$(document).ready(function() {

    var actividadAsignada_id = {{{$actividadAsignada->id}}}


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
    events: 'http://deportes.com:8000/api/agenda?' + 'actividadAsignada_id=' + actividadAsignada_id,
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
                    url: 'http://deportes.com:8000/agenda',
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
                url: 'http://deportes.com:8000/agenda/' + event.id,
                data: "&id=" + event.id
            });
            $('#calendar2').fullCalendar('removeEvents', event.id);
            window.location.reload('calendar'); //avoid update failure after drop
        } else {
        }
    }
});


});
    </script>
@stop
<style>

    body {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }

    #wrap {
        width: 1100px;
        margin: 0 auto;
    }

    #external-events {
        float: left;
        width: 150px;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
        text-align: left;
    }

    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }

    #external-events .fc-event {
        margin: 10px 0;
        cursor: pointer;
        background-color: #3a87ad;
    }

    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }

    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }

    #calendar {
        float: right;
        width: 900px;
    }

</style>