@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.technical.management') . ' | ' . trans('labels.backend.workflow.technical.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.technical.management') }}
   <small>{{ trans('labels.backend.workflow.technical.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.workflow.technical.confirm_schedules', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

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
         {{ Form::submit(trans('buttons.backend.workflows.technicals.get_technician_schedule'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->
{{ Form::close() }}


<script>
$('#calendar').fullCalendar({
   selectable: true,
   header: {
      left: 'prev,next,today',
      center: 'title',
      right: 'month'
   },

   dayClick: function(date, jsEvent, view) {

      $('#calendar').fullCalendar('gotoDate',date);
      $('#calendar').fullCalendar('changeView','agendaDay');

   },
   slotDuration: '00:05:00',
   eventLimit: true,
   editable: true,
   businessHours: [ // specify an array instead
      {
         dow: [ 1, 2, 3, 4, 5 ], // Monday, Tuesday, Wednesday
         start: '06:00', // 8am
         end: '19:00' // 5pm
      }
   ],
})
</script>
@endsection
