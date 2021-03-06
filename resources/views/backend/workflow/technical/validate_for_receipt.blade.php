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
         month:{buttonText: 'Month'},
         listDay:{buttonText: 'Today\'s Sale'}
      },
      businessHours: [ // specify an array instead
         {
            dow: [ 1, 2, 3, 4, 5 ], // Monday, Tuesday, Wednesday
            startTime: '08:00', // 8am
            endTime: '17:00' // 5pm
         }
      ],
      eventSources: [
         "{{ route('admin.workflow.technical.for_receipt') }}"
      ],
      eventLimit: true,
      editable: true
   })
});
</script>
@endsection
