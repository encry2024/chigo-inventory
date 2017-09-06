@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.technical.management') . ' | ' . trans('labels.backend.workflow.technical.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.technical.management') }}
   <small>{{ trans('labels.backend.workflow.technical.view') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['class' => 'form-horizontal']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.workflow.technical.create') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.workflow.technical.partials.technical-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('name', trans('validation.attributes.backend.inventory.technicians.name'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('name', $technical->technician->name, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.start_date_schedule'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('company_name', trans('validation.attributes.backend.inventory.customers.company_name'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('name', $technical->customer->company_name, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.start_date_schedule'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('start_date_schedule', trans('validation.attributes.backend.workflow.technicals.start_date_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('start_date_schedule', date('F d, Y', strtotime($technical->start_date_schedule)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.start_date_schedule'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('start_time_schedule', trans('validation.attributes.backend.workflow.technicals.start_time_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('start_time_schedule', date('H:i A', strtotime($technical->start_time_schedule)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.start_time_schedule'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('end_date_schedule', trans('validation.attributes.backend.workflow.technicals.end_date_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('end_date_schedule', date('F d, Y', strtotime($technical->end_date_schedule)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.end_date_schedule'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('end_time_schedule', trans('validation.attributes.backend.workflow.technicals.end_time_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('end_time_schedule', date('H:i A', strtotime($technical->end_time_schedule)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.end_time_schedule'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('note', trans('validation.attributes.backend.workflow.technicals.note'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('note', $technical->note, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.note'), 'disabled' => 'disabled']) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <table class="table table-hover">
            <thead>
               <th>ID</th>
               <th>Aircon Name</th>
               <th>Serial Number</th>
            </thead>

            <tbody>
               @foreach($technical->aircon_technicals as $aircon_technical)
               <tr>
                  <td>{{ $aircon_technical->aircon->id }}</td>
                  <td>{{ $aircon_technical->aircon->name }}</td>
                  <td>{{ $aircon_technical->aircon->serial_number }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div><!-- /.box-body -->
   </div><!--box-->

   {{ Form::close() }}

   <script type="text/javascript">
   $('.chosen-select').chosen();
   </script>
   @endsection
