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
<h4 style="text-align: center;">Mt. Etna St. Cor, Mt. Everest St., New Marikina Subd.,</h4>
<h4 style="text-align: center;">San Roque, Marikina City</h4>
<h4 style="text-align: center;">VAT Reg. TIN - 007-363-477-000</h4>

<div class="box box-success">
   <div class="box-header with-border" id="box-header">
      <h3 class="box-title">DELIVERY RECEIPT</h3>
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
                     <label for="" class="control-label col-lg-3">CUSTOMER</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;" value="{{ $sale->customer->company_name }}" disabled>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">ADDRESS</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;" value="{{ $sale->customer->address }}" disabled>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">TIN</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc;">
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-6">
               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">DATE</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;" value="{{ date('F d, Y') }}" disabled>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">SALES AGENT</label>
                     <div class="col-lg-8">
                        <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white;" value="{{ $sale->user->full_name }}" disabled>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="form-group">
                     <label for="" class="control-label col-lg-3">TERMS</label>
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
                     <th style="border: 1px solid #ccc; border-left: none;">QTY</th>
                     <th style="border: 1px solid #ccc;">UNIT</th>
                     <th style="border: 1px solid #ccc;">DESCRIPTION</th>
                     <th style="border: 1px solid #ccc;">UNIT PRICE</th>
                     <th style="border: 1px solid #ccc; border-right: none;">AMOUNT</th>
                  </thead>

                  <tbody class="table-receipt">
                     @foreach($sale->aircon_sales as $aircon_sale)
                     <tr>
                        <?php $total_sale += $aircon_sale->aircon->price; ?>
                        <td style="border-right: 1px solid #ccc;">1</td>
                        <td style="border-right: 1px solid #ccc;"></td>
                        <td style="border-right: 1px solid #ccc;">{{ $aircon_sale->aircon->name }} -- {{ $aircon_sale->aircon->serial_number }}</td>
                        <td style="border-right: 1px solid #ccc;">PHP {{ number_format($aircon_sale->aircon->price, 2) }}</td>
                        <td>PHP {{ number_format($aircon_sale->aircon->price, 2) }}</td>
                     </tr>
                     @endforeach
                  </tbody>

                  <tfoot>
                     <tr>
                        <td style="border-right: 1px solid #ccc;"></td>
                        <td style="border-right: 1px solid #ccc;"></td>
                        <td style="text-align: right; border-right: 1px solid #ccc;">TOTAL AMOUNT</td>
                        <td style="border-right: 1px solid #ccc;"></td>
                        <td>PHP {{ number_format($total_sale, 2) }}</td>
                     </tr>
                  </tfoot>
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
                           <label class="control-label">PREPARED BY:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;">
                           <label class="control-label">CHECKED BY:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;" value="JEROLD SANTOS" disabled>
                           <label class="control-label">APPROVED BY:</label>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <div class="col-lg-12" style="text-align: center;">
                           <input type="text" class="form-control" style="border: 0px; border-bottom: 1px solid #ccc; background-color: white; text-align: center;" >
                           <label class="control-label ">PRINTED NAME/SIGNATURE:</label>
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
