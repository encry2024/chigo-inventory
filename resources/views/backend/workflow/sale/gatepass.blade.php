@extends('backend.layouts.app')

@section('page-header')
<h1>
   CHIGO INVENTORY CRM
   <small>DELIVERY RECEIPT</small>
</h1>
@endsection

@section('content')
<?php $total_sale = 0; ?>
<h3 style="text-align: center;">CHIGO Airconditioning & Appliances, INC.</h3>

<div class="box box-success">
   <div class="box-header with-border" id="box-header">
      <h3 class="box-title">GATEPASS</h3>
      <div class="box-tools pull-right">
         <a class="btn btn-sm btn-primary" id="printBtn" href="javascript:window.print()">Print</a>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->

   <div class="box-body">
      <form action="" class="form-horizontal">
         <div class="row">
            <div class="col-lg-6">
               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">Issued By:</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;">
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">Customers</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;" value="@foreach($sales as $sale){{ $sale->customer->company_name }}, @endforeach
                        " disabled>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-6">
               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">GP#: </label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;">
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">DATE:</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;" value="{{ date('Y-m-d') }}" disabled>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">Plate No:</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;">
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <br><br>

         <div class="row">
            <div class="col-lg-12">
               <table class="table ">
                  <thead>
                     <th style="border: 1px solid #ccc; border-left: none;">MODEL</th>
                     <th style="border: 1px solid #ccc;">DESCRIPTION</th>
                     <th style="border: 1px solid #ccc;">QTY</th>
                     <th style="border: 1px solid #ccc; border-right: none;">SERIAL NUMBER</th>
                  </thead>

                  <tbody class="table-receipt">
                     @foreach($sales as $sale)
                        @foreach($sale->aircon_sales as $aircon_sale)
                        <tr>
                           <td style="border-right: 1px solid #ccc;"></td>
                           <td style="border-right: 1px solid #ccc;">{{ $aircon_sale->aircon->name }}</td>
                           <td style="border-right: 1px solid #ccc;">1</td>
                           <td style="border-right: none;">{{ $aircon_sale->aircon->serial_number }}</td>
                        </tr>
                        @endforeach
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>

         <br><br>

         <div class="row">
            <div class="col-lg-12">
               <form action="" class="form-horizontal">
                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;" value="{{ Auth::user()->full_name }}" disabled>
                           <label class="control-label">Prepared By:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;">
                           <label class="control-label">Checked By:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;">
                           <label class="control-label">Received By:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;" >
                           <label class="control-label ">Guard on Duty:</label>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-12">
               <form action="" class="form-horizontal">
                  <div class="col-lg-4">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">

                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;" value="JEROLD SANTOS" disabled>
                           <label class="control-label">Approved By:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">

                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </form>
   </div><!-- box body -->
</div><!--box box-success-->
@endsection
