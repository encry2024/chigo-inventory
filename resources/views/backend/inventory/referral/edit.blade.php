@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.referral.management') . ' | ' . trans('labels.backend.inventory.referral.edit'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.referral.management') }}
   <small>{{ trans('labels.backend.inventory.referral.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($referral, ['route' => ['admin.inventory.referral.update', $referral], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.referral.edit') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.referral.includes.partials.referral-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('name', trans('validation.attributes.backend.inventory.referrals.name'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('name', $referral->name, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.inventory.referrals.name')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('address', trans('validation.attributes.backend.inventory.referrals.address'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('address', $referral->address, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.referrals.address')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('notes', trans('validation.attributes.backend.inventory.referrals.notes'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('notes', $referral->notes, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.inventory.referrals.notes')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->
</div><!--box-->

<div class="box box-success">
   <div class="box-body">
      <div class="pull-left">
         {{ link_to_route('admin.inventory.referral.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
         {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->

{{ Form::hidden('referral_id', $referral->id) }}

{{ Form::close() }}
@endsection

@section('after-scripts')
{{ Html::script('js/backend/access/users/script.js') }}
@endsection
