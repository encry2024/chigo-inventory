@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
<h1>
   {{ trans('labels.backend.access.users.management') }}
   <small>{{ trans('labels.backend.access.users.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($aircon, ['route' => ['admin.access.user.update', $aircon], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.access.includes.partials.user-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">

      <div class="form-group">
         {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-1">
            {{ Form::checkbox('status', '1', $aircon->status == 1) }}
         </div><!--col-lg-1-->
      </div><!--form control-->
   </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-success">
   <div class="box-body">
      <div class="pull-left">
         {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
         {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->

@if ($aircon->id == 1)
{{ Form::hidden('status', 1) }}
@endif

{{ Form::close() }}
@endsection

@section('after-scripts')
{{ Html::script('js/backend/access/users/script.js') }}
@endsection
