@extends('backend.layouts.app')

@section('page-header')
<h1>
   CHIGO INVENTORY CRM
   <small>DELIVERY RECEIPT</small>
</h1>
@endsection

@section('content')
<?php $total_sale = 0; ?>
<?php $receiptLocation = 0; ?>

<div class="box box-success">
   <div class="box-header with-border" id="box-header">
      <h3 class="box-title">DELIVERY RECEIPT</h3>
      <div class="box-tools pull-right">
         <a class="btn btn-sm btn-primary" id="printBtn" href="javascript:window.print()">Print</a>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->

   <div class="box-body">
      <form action="" class="form-horizontal" style="margin-bottom: 40rem;">
         <div class="">
         <img src="{{ asset('RECEIPT.jpg') }}" alt="">
         </div>
      </form>

      <label class="customerName">{{ $sale->customer->company_name }}</label>
      <label class="customerAddress">{{ $sale->customer->address }}</label>
      <label class="salesAgent">{{ $sale->user->first_name }} {{ $sale->user->last_name }}</label>
      <label class="terms">{{ $sale->terms }}</label>
      <label class="dateNeeded">{{ $sale->date_needed }}</label>


      @foreach($sale->aircon_sales as $aircon_sale)
      <div class="receiptContainer" style="top: {{ $receiptLocation }}rem;" id="receiptContainer">
         <?php $total_sale += $aircon_sale->aircon->selling_price - ($aircon_sale->aircon->selling_price * $sale->customer->discount); ?>
         <label class="airconQty">1</label>
         <label class="airconDescription" >{{ $aircon_sale->aircon->door_type }} -- {{ $aircon_sale->aircon->serial_number }} -- Discount [ {{ $sale->customer->discount * 100 }}% ]</label>
         <label class=""></label>
         <label class="airconPrice">{{ number_format($aircon_sale->aircon->selling_price, 2) }}</label>
         <label class="airconAmount">{{ number_format($aircon_sale->aircon->selling_price - ($aircon_sale->aircon->selling_price * $sale->customer->discount), 2) }}</label>
         <button class="btn btn-xs btn-danger removeFromReceipt" name="button" id="removeItem">Remove from receipt {{ $receiptLocation }}</button>
         <br>
      </div>
      <?php $receiptLocation += 2; ?>
      @endforeach

      @if($sale->parts != 0)
         @foreach($sale->peripheral_sales as $peripheral_sale)
         <div class="receiptContainer" style="top: {{ $receiptLocation }}rem;" id="receiptContainer">
            <?php $total_sale += ($peripheral_sale->peripheral->selling_price * $peripheral_sale->quantity) - ($peripheral_sale->peripheral->selling_price * $peripheral_sale->quantity * $sale->customer->discount); ?>
            <label class="airconQty">{{ $peripheral_sale->quantity }}</label>
            <label class="airconDescription" >{{ $peripheral_sale->peripheral->description }} -- {{ $peripheral_sale->peripheral->serial_number }} -- Discount [ {{ $sale->customer->discount * 100 }}% ]</label>
            <label class=""></label>
            <label class="airconPrice">{{ number_format($peripheral_sale->peripheral->selling_price, 2) }}</label>
            <label class="airconAmount">{{ number_format($peripheral_sale->peripheral->selling_price * $peripheral_sale->quantity - ($peripheral_sale->peripheral->selling_price * $sale->customer->discount), 2) }}</label>
            <button class="btn btn-xs btn-danger removeFromReceipt" name="button" id="removeItem">Remove from receipt {{ $receiptLocation }}</button>
            <br>
         </div>
         <?php $receiptLocation += 3.5; ?>
         @endforeach
      @endif


      <label class="totalAmount" id="total_amount">{{ number_format($total_sale, 2) }}</label>
   </div><!-- box body -->
</div><!--box box-success-->

<script type="text/javascript">
function format1(n, currency) {
   return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
      return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
   });
}


$(".removeFromReceipt").on("click", function() {
   var closestDiv       = $(this).closest('div'),
   receiptContainer     = document.getElementsByClassName("receiptContainer"),
   amountLabel          = document.getElementsByClassName("airconAmount"),
   totalAmountLabel     = document.getElementById("total_amount"),
   receiptTopLocation   = 0,
   totalAmount          = 0;

   closestDiv.remove();

   $( receiptContainer ).each(function( i, obj ) {
      obj.style.top = receiptTopLocation + "rem";
      receiptTopLocation += 2;
   });

   $( amountLabel ).each(function( i, obj ) {
      totalAmount += parseFloat(obj.innerHTML.replace(',', ''));

   });
   console.log(totalAmount);
   totalAmountLabel.innerHTML = format1(totalAmount, "");
})
</script>
@endsection
