@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.peripheral.management') . ' | ' . trans('labels.backend.inventory.peripheral.edit'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.peripheral.management') }}
   <small>{{ trans('labels.backend.inventory.peripheral.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($peripheral, ['route' => ['admin.inventory.item.peripheral.update', $peripheral], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

{{ Form::hidden('peripheral_id', $peripheral->id) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.peripheral.edit') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.item.peripheral.includes.partials.peripheral-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('description', trans('validation.attributes.backend.inventory.peripherals.description'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('description', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.inventory.peripherals.description')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('serial_number', trans('validation.attributes.backend.inventory.peripherals.serial_number'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('serial_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.peripherals.serial_number')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('quantity', trans('validation.attributes.backend.inventory.peripherals.quantity'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('quantity', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.peripherals.quantity')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('price', trans('validation.attributes.backend.inventory.peripherals.price'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <div class="input-group">
               <div class="input-group-addon">$</div>
               {{ Form::text('price', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.peripherals.price')]) }}
            </div>
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->
</div><!--box-->

<div class="box box-success">
   <div class="box-body">
      <div class="pull-left">
         {{ link_to_route('admin.inventory.item.peripheral.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
         {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->



{{ Form::close() }}
@endsection
