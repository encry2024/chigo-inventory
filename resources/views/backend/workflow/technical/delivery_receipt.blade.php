@extends('backend.layouts.app')

@section('page-header')
<h1>
   CHIGO INVENTORY CRM
   <small>DELIVERY RECEIPT</small>
</h1>
@endsection

@section('content')
<?php $total_sale = 0; ?>
<div class="box box-success">
   <div class="box-header with-border" id="box-header">
      <h3 class="box-title">DELIVERY RECEIPT</h3>
      <div class="box-tools pull-right">
         <a class="btn btn-sm btn-primary" id="printBtn" href="javascript:window.print()">Print</a>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->

   <div class="box-body">
      <form action="" class="form-horizontal">
         <img src="{{ asset('RECEIPT.jpg') }}" alt="">
      </form>

      <label class="customerName">{{ $technical->customer->company_name }}</label>
      <label class="customerAddress">{{ $technical->customer->address }}</label>
      <label class="salesAgent">{{ $technical->user->first_name }} {{ $technical->user->last_name }}</label>
      <label class="terms">{{ $technical->terms }}</label>
      <label class="dateNeeded">{{ $technical->date_needed }}</label>

      <div class="airconQty">
         <label>1</label><br>
      </div>

      <div class="airconDescription">
         <label>{{ $technical->service }}</label><br>
      </div>

   </div><!-- box body -->
</div><!--box box-success-->
@endsection
