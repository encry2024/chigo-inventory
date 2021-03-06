@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.customer.management') . ' | ' . trans('labels.backend.inventory.customer.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.customer.management') }}
   <small>{{ trans('labels.backend.inventory.customer.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.inventory.customer.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.customer.create') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.access.includes.partials.customer-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('company_name', trans('validation.attributes.backend.inventory.customers.company_name'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('company_name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.inventory.customers.company_name')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('contact_number', trans('validation.attributes.backend.inventory.customers.contact_number'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('contact_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.contact_number')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('alternative_contact_number', 'Alternative Contact',
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('alternative_contact_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.alternative_contact_number')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('email', trans('validation.attributes.backend.inventory.customers.email'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.email')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('address', trans('validation.attributes.backend.inventory.customers.address'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.address')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('note', trans('validation.attributes.backend.inventory.customers.note'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('note', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.note')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('other_category', trans('validation.attributes.backend.inventory.customers.other_category'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('other_category', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.other_category')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('customer_type_id', trans('validation.attributes.backend.inventory.customers.customer_type'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <select class="form-control" name="customer_type">
               <option value="1">Residential</option>
               <option value="2">Commercial</option>
               <option value="3">Business</option>
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('referral', trans('validation.attributes.backend.inventory.customers.referral'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <select data-placeholder="Choose the referral..." id="referralDropdown" name="referral" class="form-control chosen-select">
               <option value=""></option>
               <option value="0">No Referral</option>
               @foreach($referrals as $referral)
               <option value="{{ $referral->id }}">{{ $referral->name }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('discount', trans('validation.attributes.backend.inventory.customers.discount'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('discount', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.inventory.customers.discount')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.inventory.customer.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
         </div><!--pull-left-->

         <div class="pull-right">
            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
         </div><!--pull-right-->

         <div class="clearfix"></div>
      </div><!-- /.box-body -->
   </div><!--box-->

   {{ Form::close() }}

   <script type="text/javascript">
   $(document).ready(function() {
      $('.chosen-select').chosen();
   });
   </script>
   @endsection
