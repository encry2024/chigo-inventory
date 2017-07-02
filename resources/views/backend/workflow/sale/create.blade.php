@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.sale.management') . ' | ' . trans('labels.backend.workflow.sale.create'))

@section('page-header')
<h1>
{{ trans('labels.backend.workflow.sale.management') }}
<small>{{ trans('labels.backend.workflow.sale.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.inventory.item.aircon.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

<div class="box box-success">
<div class="box-header with-border">
   <h3 class="box-title">{{ trans('labels.backend.workflow.sale.create') }}</h3>

   <div class="box-tools pull-right">
      @include('backend.workflow.sale.partials.sale-header-buttons')
   </div><!--box-tools pull-right-->
</div><!-- /.box-header -->

<div class="box-body">
   <div class="form-group">
      {{ Form::label('customer_id', trans('validation.attributes.backend.workflow.sales.customer_id'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.name')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('serial_number', trans('validation.attributes.backend.inventory.aircons.serial_number'),
      ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('serial_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.serial_number')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('manufacturer', trans('validation.attributes.backend.inventory.aircons.manufacturer'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('manufacturer', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.manufacturer')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('brand_name', trans('validation.attributes.backend.inventory.aircons.brand_name'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('brand_name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.brand_name')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('voltage', trans('validation.attributes.backend.inventory.aircons.voltage'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('voltage', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.voltage')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('horsepower', trans('validation.attributes.backend.inventory.aircons.horsepower'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('horsepower', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.horsepower')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('size', trans('validation.attributes.backend.inventory.aircons.size'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('size', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.size')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('feature', trans('validation.attributes.backend.inventory.aircons.feature'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         {{ Form::text('feature', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.feature')]) }}
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('price', trans('validation.attributes.backend.inventory.aircons.price'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-10">
         <div class="input-group">
            <div class="input-group-addon">$</div>
            {{ Form::text('price', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.price')]) }}

         </div>
      </div><!--col-lg-10-->
   </div><!--form control-->

   <div class="form-group">
      {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

      <div class="col-lg-1">
         {{ Form::checkbox('status', '1', true, ['style' => 'margin: 11px 0 0;']) }}
      </div><!--col-lg-1-->
   </div><!--form control-->
</div><!--box-->

<div class="box box-info">
   <div class="box-body">
      <div class="pull-left">
         {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
         {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->

{{ Form::close() }}
@endsection
