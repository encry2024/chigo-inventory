@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.technician.management') . ' | ' . trans('labels.backend.inventory.technician.edit'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.technician.management') }}
   <small>{{ trans('labels.backend.inventory.technician.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($technician, ['route' => ['admin.inventory.technician.update', $technician], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.technician.edit') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.technician.includes.partials.technician-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('name', trans('validation.attributes.backend.inventory.technicians.name'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.name')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('email', trans('validation.attributes.backend.inventory.technicians.email'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.email')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('address', trans('validation.attributes.backend.inventory.technicians.address'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.address')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('contact_number', trans('validation.attributes.backend.inventory.technicians.contact_number'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('contact_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.contact_number')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('note', trans('validation.attributes.backend.inventory.technicians.note'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('note', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.note')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('status', trans('validation.attributes.backend.inventory.technicians.status'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('status', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.technicians.status')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->
</div><!--box-->

<div class="box box-success">
   <div class="box-body">
      <div class="pull-left">
         {{ link_to_route('admin.inventory.technician.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
         {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->

{{ Form::hidden('technician_id', $technician->id) }}

{{ Form::close() }}
@endsection

@section('after-scripts')
{{ Html::script('js/backend/access/users/script.js') }}
@endsection
