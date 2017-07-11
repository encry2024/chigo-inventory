@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.sale.management') . ' | ' . trans('labels.backend.workflow.sale.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.sale.management') }}
   <small>{{ trans('labels.backend.workflow.sale.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.workflow.sale.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

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
            <select data-placeholder="Choose a Customer..." id="customerDropdown" name="customer" class="form-control chosen-select">
               <option value=""></option>
               @foreach($customers as $customer)
               <option value="{{ $customer->id }}">{{ $customer->company_name }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('aircon', trans('validation.attributes.backend.inventory.aircons.name'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <select data-placeholder="Choose an Aircon..." id="airconDropdown" name="aircon" class="form-control chosen-select">
               <option value=""></option>
               @foreach($aircons as $aircon)
               <option value="{{ $aircon->id }}">{{ $aircon->name }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('agent_name', 'Sales Agent', ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('agent_name', access()->user()->full_name, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'disabled' => 'disabled']) }}
         </div><!--col-lg-1-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('date', 'Date', ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('date', date('F d, Y'), ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'disabled' => 'disabled']) }}
         </div><!--col-lg-1-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('note', 'Note', ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('note', null, ['class' => 'form-control', 'maxlength' => '191', 'autofocus' => 'autofocus']) }}
         </div><!--col-lg-1-->
      </div><!--form control-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.workflow.sale.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
