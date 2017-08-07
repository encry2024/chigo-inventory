@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.aircon.management') . ' | ' . trans('labels.backend.inventory.aircon.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.aircon.management') }}
   <small>{{ trans('labels.backend.inventory.aircon.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.inventory.item.aircon.import.data', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.aircon.create') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.access.includes.partials.aircon-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('aircon_file', trans('validation.attributes.backend.inventory.aircons.aircon_file'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::file('aircon_file', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.inventory.aircons.aircon_file')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.inventory.item.aircon.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
         </div><!--pull-left-->

         <div class="pull-right">
            {{ Form::submit(trans('buttons.backend.inventory.items.aircons.import'), ['class' => 'btn btn-success btn-xs']) }}
         </div><!--pull-right-->

         <div class="clearfix"></div>
      </div><!-- /.box-body -->
   </div><!--box-->

   {{ Form::close() }}
   @endsection
