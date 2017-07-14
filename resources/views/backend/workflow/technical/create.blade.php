@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.technical.management') . ' | ' . trans('labels.backend.workflow.technical.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.technical.management') }}
   <small>{{ trans('labels.backend.workflow.technical.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.workflow.technical.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

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
            <select data-placeholder="Choose Technician..." id="technicianDropdown" name="technician" class="form-control chosen-select">
               <option value=""></option>
               @foreach($technicians as $technician)
               <option value="{{ $technician->id }}">{{ $technician->name }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('company_name', trans('validation.attributes.backend.inventory.customers.company_name'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <select data-placeholder="Choose a Customer..." id="customerDropdown" name="customer" class="form-control chosen-select">
               <option value=""></option>
               @foreach($customers as $customer)
               <option value="{{ $customer->id }}">{{ $customer->company_name }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('start_date_schedule', trans('validation.attributes.backend.workflow.technicals.start_date_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('start_date_schedule', date('F d, Y', strtotime($startScheduleDate)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.start_date_schedule')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('start_time_schedule', trans('validation.attributes.backend.workflow.technicals.start_time_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('start_time_schedule', date('H:i A', strtotime($startScheduleTime)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.start_time_schedule')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('end_date_schedule', trans('validation.attributes.backend.workflow.technicals.end_date_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('end_date_schedule', date('F d, Y', strtotime($endScheduleDate)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.end_date_schedule')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('end_time_schedule', trans('validation.attributes.backend.workflow.technicals.end_time_schedule'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('end_time_schedule', date('H:i A', strtotime($endScheduleTime)), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.end_time_schedule')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('note', trans('validation.attributes.backend.workflow.technicals.note'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('note', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.workflow.technicals.note')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.workflow.technical.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
         </div><!--pull-left-->

         <div class="pull-right">
            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
         </div><!--pull-right-->

         <div class="clearfix"></div>
      </div><!-- /.box-body -->
   </div><!--box-->

   {{ Form::close() }}

   <script type="text/javascript">
   $('.chosen-select').chosen();
   </script>
   @endsection
