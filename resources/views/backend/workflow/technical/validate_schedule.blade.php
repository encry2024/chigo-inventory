@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.technical.management') . ' | ' . trans('labels.backend.workflow.technical.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.technical.management') }}
   <small>{{ trans('labels.backend.workflow.technical.create') }}</small>
</h1>
@endsection

@section('content')
<form class="form-horizontal">

   <div class="box box-success">
      <div class="box-header with-border">
         <h3 class="box-title">{{ trans('labels.backend.workflow.technical.check_date_time') }}</h3>

         <div class="box-tools pull-right">
            @include('backend.workflow.technical.partials.technical-header-buttons')
         </div><!--box-tools pull-right-->
      </div><!-- /.box-header -->

      <div class="box-body">
         <div id="calendar"></div>
      </div>
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.workflow.technical.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
         </div><!--pull-left-->

         <div class="pull-right">
            <a id="processTechnicalWorkflow" class="btn btn-success btn-xs">{{ trans('buttons.backend.workflows.technicals.get_technician_schedule') }}</a>
         </div><!--pull-right-->

         <div class="clearfix"></div>
      </div><!-- /.box-body -->
   </div><!--box-->

   <input type="hidden" id="schedule" name="schedule">

</form>


<script>

$(document).ready(function() {
   $('#calendar').fullCalendar({
      selectable: true,
      header:
      {
         left: 'prev,next,today',
         center: 'title',
         right: 'month,listWeek'

      },
      dayClick: function(date, jsEvent, view) {
         $('#calendar').fullCalendar('gotoDate', date);
         $('#calendar').fullCalendar('changeView','agendaDay');
      },
      views:
      {
         listWeek:{buttonText: 'List Week'},
         month:{buttonText: 'Month'}
      },
      businessHours: [ // specify an array instead
         {
            dow: [ 1, 2, 3, 4, 5 ], // Monday, Tuesday, Wednesday
            startTime: '08:00', // 8am
            endTime: '17:00' // 5pm
         }
      ],
      select: function( start, end)
      {
         var check = start.format();
         var today = moment().format();

         var redirect_url = "{{ route('admin.workflow.technical.process_technical_workflow', ':schedule') }}";
         redirect_url = redirect_url.replace(':schedule', start.format()+'&'+end.format());

         document.getElementById("processTechnicalWorkflow").href =  redirect_url;
      },
      eventSources: [
         "{{ route('admin.workflow.technical.fetch_technical_schedules') }}"
      ],
      // events: [
      //    {
      //       title: 'swefwefwfwed',
      //       start: '2017-09-05 09:00:00',
      //       end: '2017-09-05 10:30:00',
      //       url: '{{ route('admin.workflow.technical.show', 1) }}'
      //    },
      //    {
      //       id: 999,
      //       title: 'Repeating Event',
      //       start: '2017-09-09T16:00:00'
      //    },
      //    {
      //       id: 999,
      //       title: 'Repeating Event',
      //       start: '2017-09-16T16:00:00'
      //    },
      //    {
      //       title: 'Conference',
      //       start: '2017-09-11',
      //       end: '2017-09-13'
      //    },
      //    {
      //       title: 'Meeting',
      //       start: '2017-09-12T10:30:00',
      //       end: '2017-09-12T12:30:00'
      //    },
      //    {
      //       title: 'Lunch',
      //       start: '2017-09-12T12:00:00'
      //    },
      //    {
      //       title: 'Meeting',
      //       start: '2017-09-12T14:30:00'
      //    },
      //    {
      //       title: 'Happy Hour',
      //       start: '2017-09-12T17:30:00'
      //    },
      //    {
      //       title: 'Dinner',
      //       start: '2017-09-12T20:00:00'
      //    },
      //    {
      //       title: 'Birthday Party',
      //       start: '2017-09-13T07:00:00'
      //    },
      //    {
      //       title: 'Click for Google',
      //       url: 'http://google.com/',
      //       start: '2017-09-28'
      //    }
      // ],
      eventLimit: true,
      editable: true
   })
});
</script>
@endsection
