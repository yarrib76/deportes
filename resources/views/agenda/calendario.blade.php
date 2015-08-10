@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>

            <div id='external-events'>
                <h4>Draggable Events</h4>
                <div class='fc-event'>My Event 1</div>
                <div class='fc-event'>My Event 2</div>
                <div class='fc-event'>My Event 3</div>
                <div class='fc-event'>My Event 4</div>
                <div class='fc-event'>My Event 5</div>
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

    <script>

        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events .fc-event').each(function() {

            // store data so the calendar knows to render an event upon drop

            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });

        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();


            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },

                events: "http://deportes.com:8000/api/agenda",

                // Convert the allDay from string to boolean
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                droppable: true,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    var url = prompt('Type Event url, if exits:');
                    if (title) {
                        var start = moment(start).format('YYYY-MM-DDTHH:mm:ssZ');
                        var end = moment(end).format('YYYY-MM-DDTHH:mm:ssZ');
                        $.ajax({
                            url: 'http://deportes.com:8000/agenda',
                            data: 'title='+ title+'&start='+ start +'&end='+ start +'&url='+ url ,
                            type: "POST",
                            success: function(json) {
                                alert('Added Successfully');
                            }
                        });
                        calendar.fullCalendar('renderEvent',
                                {
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                },
                                true // make the event "stick"
                        );
                    }
                    calendar.fullCalendar('unselect');
                    window.location.reload('calendar'); //avoid update failure after drop
                },

                editable: true,
                eventDrop: function(event, delta) {

                    if(copiedEventObject.title){
                        var title = copiedEventObject.title;
                        var url = copiedEventObject.url;
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
                            $.ajax({
                                url: 'http://localhost/fullcalendar/add_events.php',
                                data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
                                type: "POST"
                            });
                        }
                        calendar.fullCalendar('unselect');
                        window.location.reload('calendar'); //avoid update failure after drop
                    }

                    var start = moment(start).format('YYYY-MM-DDTHH:mm:ssZ');
                    var end = moment(end).format('YYYY-MM-DDTHH:mm:ssZ');
                    $.ajax({
                        url: 'http://deportes.com:8000/agenda/'+ event.id +'?' + 'title='+ event.title+'&start='+ start +'&end='+ end,
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end,
                        type: "PATCH",
                        success: function(json) {
                            alert("Updated Successfully");
                        }
                    });
                },
                eventResize: function(event) {
                    var start = moment(start).format('YYYY-MM-DDTHH:mm:ssZ');
                    var end = moment(end).format('YYYY-MM-DDTHH:mm:ssZ');
                    $.ajax({
                        url: 'http://localhost:8888/fullcalendar/update_events.php',
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                        type: "POST",
                        success: function(json) {
                            alert("Updated Successfully");
                        }
                    });

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