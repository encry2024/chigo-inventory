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
         {{ Form::label('referral_id', trans('validation.attributes.backend.workflow.sales.referral'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <select data-placeholder="Choose a Referral..." id="referralDropdown" name="referral" class="form-control chosen-select">
               <option value=""></option>
               @foreach($referrals as $referral)
               <option value="{{ $referral->id }}">{{ $referral->name }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('aircon', trans('validation.attributes.backend.inventory.aircons.serial_number'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            <select data-placeholder="Choose an Aircon..." id="airconDropdown" name="aircon[]" multiple class="form-control chosen-select aircon-select">
               <option value=""></option>
               @foreach($aircons as $aircon)
               <option value="{{ $aircon->id }}">{{ $aircon->name }} - {{ $aircon->serial_number }} - {{ $aircon->door_type }}</option>
               @endforeach
            </select>

         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('peripheral', trans('validation.attributes.backend.inventory.peripherals.description'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-7">
            <select data-placeholder="Choose a Peripheral..." id="peripheralDropdown" name="aircon[]" class="form-control chosen-select peripheral-select">
               <option value=""></option>
               @foreach($peripherals as $peripheral)
               <option value="{{ $peripheral->id }}">{{ $peripheral->description }} - {{ $peripheral->serial_number }}</option>
               @endforeach
            </select>
         </div><!--col-lg-10-->

         <div class="col-lg-2">
            <input type="text" name="quantity" placeholder="Enter quantity" class="form-control" id="quantity">
         </div><!--col-lg-2-->

         <a class="btn btn-success" id="add_selected_peripheral"><i class="fa fa-plus"></i></a>
      </div><!--form control-->

      <div id="selectedPeripheralContainer">
      </div>


      <div class="form-group">
         {{ Form::label('agent_name', trans('validation.attributes.backend.workflow.sales.sales_agent'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('agent_name', access()->user()->full_name, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'disabled' => 'disabled']) }}
         </div><!--col-lg-1-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('terms', trans('validation.attributes.backend.workflow.sales.terms'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('terms', '', ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.workflow.sales.terms')]) }}
         </div><!--col-lg-1-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('date_needed', trans('validation.attributes.backend.workflow.sales.date_needed'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('date_needed', '', ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.workflow.sales.date_needed')]) }}
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
            {{ Form::text('note', null, ['class' => 'form-control', 'maxlength' => '191', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.workflow.sales.notes')]) }}
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

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" name="itemQuantity">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a class="btn btn-primary" data-dismiss="modal" >Save changes</a>
            </div>
         </div>
      </div>
   </div>

   {{ Form::close() }}

   <script type="text/javascript">
   $(document).ready(function() {
      var selected_peripheral = '',
      peripheral_quantity  =  0,
      quantity_field = document.getElementById('quantity'),
      peripheral_container = $('#selectedPeripheralContainer');

      $('.chosen-select').chosen();

      /*
      *  Get the ID of the selected peripheral item.
      */
      $('#peripheralDropdown').chosen().change(function() {
         selected_peripheral = $(this).val();
      });

      /*
      *  Upon clicking the add button.
      *  Append the selected items on the <div> element to show the selected Peripherals
      *  to the user.
      */
      $('#add_selected_peripheral').on('click', function() {
         peripheral_quantity = quantity_field.value;

         var get_select_peripheral_name = '{{ route("admin.inventory.item.peripheral.get_selected_peripheral_name", ":selected_peripheral_id") }}';
         get_select_peripheral_name = get_select_peripheral_name.replace(':selected_peripheral_id', selected_peripheral);

         /*
         *  Send the ID to the URL to check it in the database and retrieve it's description.
         */
         $.getJSON(get_select_peripheral_name, function(data) {
            peripheral_container.append(
               '<div class="form-group">' +
               '<label class="col-lg-2"></label>' +
               '<div class="col-lg-7">' +
               '<input type="text" name="chosen_peripheral[]" placeholder="Enter quantity" class="form-control" id="quantity" value="' + data + '" disabled>' +
               '</div>' +
               '<div class="col-lg-2">' +
               '<input type="text" name="inputted_quantity[]" placeholder="Enter quantity" class="form-control" id="quantity" value="' + peripheral_quantity + '"  disabled>' +
               '</div>' +
               '<a class="btn btn-danger remove_selected_peripheral" id="remove_selected_peripheral"><i class="fa fa-minus"></i></a>' +
               '<input name="getPeripherals[]" type="hidden" value="'+ selected_peripheral + '-' + peripheral_quantity + '">' +
               '</div>'
            );
         });
      });
   });
   </script>
   @endsection
