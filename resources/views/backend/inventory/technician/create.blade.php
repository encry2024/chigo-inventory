@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.technician.management') . ' | ' . trans('labels.backend.inventory.technician.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.technician.management') }}
   <small>{{ trans('labels.backend.inventory.technician.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.inventory.technician.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.technician.create') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.technician.includes.partials.technician-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('name', trans('validation.attributes.backend.inventory.technicians.name'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.name')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('contact_number', trans('validation.attributes.backend.inventory.technicians.contact_number'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('contact_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.contact_number')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('email', trans('validation.attributes.backend.inventory.technicians.email'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.email')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('address', trans('validation.attributes.backend.inventory.technicians.address'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.address')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.inventory.technician.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
         </div><!--pull-left-->

         <div class="pull-right">
            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
         </div><!--pull-right-->

         <div class="clearfix"></div>
      </div><!-- /.box-body -->
   </div><!--box-->

   {{ Form::close() }}
   @endsection
