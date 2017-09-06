@extends('backend.layouts.app')

@section('page-header')
<h1>
   {{ app_name() }}
   <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</h3>
   </div><!-- /.box-header -->

   <div class="box-body">
      <div id="calendar"></div>
   </div>
</div><!--box box-success-->

<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
      <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->
   <div class="box-body">
      {!! history()->render() !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->


<script>
$(document).ready(function() {
   $('#calendar').fullCalendar({
      selectable: true,
      header:
      {
         left: 'prev,next,today',
         center: 'title',
         right: 'month,listWeek,listDay'

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
         "{{ route('admin.workflow.sale.get_deliveries') }}"
      ],
      eventLimit: true,
      editable: true
   })
});
</script>
@endsection
