@extends('layouts.app')

@section('content')

<div class="container-fluid" >
	

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href="{{asset('assets/fullcalendar/lib/main.css')}}" rel='stylesheet' />
<link href="{{asset('assets/fullcalendar/css/style.css')}}" rel='stylesheet' />
<script src="{{asset('assets/fullcalendar/lib/main.js')}}"></script>
<script src="{{asset('assets/fullcalendar/lib/locales-all.js')}}"></script>


<script>
	document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new FullCalendar.Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new FullCalendar.Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      locale: 'es',
      navLinks: true,
      eventLimit: true,
      selectable:true,
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      },
      eventDrop: function(event){
      	alert('Cita removida');
      },
      eventResize: function(event){
      	alert('Cita alargada');
      },
      
    });
    calendar.render();

  });
</script>
</head>
<div>
	

<body>
  <div id='wrap' >

    <div id='external-events'>
      <h4>Servicios</h4>

      <div id='external-events-list'>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>Consulta</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>Operación</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>Desparasitación</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>Grooming</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>Otro</div>
        </div>
      </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>Remover despúes de eliminar</label>
      </p>
    </div>

    <div id='calendar-wrap'>
      <div id='calendar'></div>
    </div>

  </div>
</body>

</html>

</div>

@endsection