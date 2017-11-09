@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.sale.management'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.sale.management') }}
   <small>Sales Report - Total Income Sales Workflow</small>
</h1>
@endsection

@section('content')
<?php $total_income_per_sale = 0; ?>
<?php $total_income = 0; ?>
<?php $total_income_for_aircon = 0; ?>
<?php $total_income_for_peripheral = 0; ?>

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">Sales Report - Total Income Sales Workflow</h3>
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="row">
         <div class="col-sm-3">
            <div class="card bg-success text-white">
               <div class="card-body">
                  <h4>{{ count($sales) }}</h4>
                  <p>Total Collected Sales</p>
               </div>
            </div>
         </div>

         <div class="col-sm-3">
            <div class="card bg-info text-white">
               <div class="card-body">
                  <h4 id="total_income"></h4>
                  <p>Total Sales Income</p>
               </div>
            </div>
         </div>

         <div class="col-sm-3">
            <div class="card bg-info text-white">
               <div class="card-body">
                  <h4 id="total_income_for_aircon"></h4>
                  <p>Total Income for Aircon</p>
               </div>
            </div>
         </div>

         <div class="col-sm-3">
            <div class="card bg-info text-white">
               <div class="card-body">
                  <h4 id="total_income_for_peripheral"></h4>
                  <p>Total Income for Peripheral</p>
               </div>
            </div>
         </div>
      </div>

      <hr>

      <div class="table-responsive">
         <table id="sales-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.workflow.sale.table.reference_number') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.sales_agent') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.customer_name') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.total_income') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.date_created') }}</th>
               </tr>
            </thead>

            <tbody>
               @foreach($sales as $sale)
               <tr>
                  <td>{{ $sale->reference_number }}</td>
                  <td>{{ $sale->user->full_name }}</td>
                  <td>{{ $sale->customer->company_name }}</td>
                  <td>

                     @if($sale->aircon == 1)
                        @foreach($sale->aircon_sales as $aircon_sale)
                           <?php $total_income_per_sale += $aircon_sale->aircon->selling_price; ?>
                           <?php $total_income += $aircon_sale->aircon->selling_price; ?>
                           <?php $total_income_for_aircon += $aircon_sale->aircon->selling_price; ?>
                        @endforeach
                     @endif

                     @if($sale->parts == 1)
                        @foreach($sale->peripheral_sales as $peripheral_sale)
                           <?php $total_income_per_sale += $peripheral_sale->peripheral->price * $peripheral_sale->quantity; ?>
                           <?php $total_income += $peripheral_sale->peripheral->price * $peripheral_sale->quantity; ?>
                           <?php $total_income_for_peripheral += $peripheral_sale->peripheral->price * $peripheral_sale->quantity; ?>
                        @endforeach
                     @endif

                     PHP {{ number_format($total_income_per_sale, 2) }}
                  </td>
                  <td>{{ $sale->created_at }}</td>
               </tr>
               <?php $total_income; ?>
               <?php $total_income_for_aircon; ?>
               <?php $total_income_for_peripheral; ?>
               <?php $total_income_per_sale = 0; ?>
               @endforeach
            </tbody>
         </table>
      </div><!--table-responsive-->
   </div><!-- /.box-body -->
</div><!--box-->

<script>
   $(document).ready(function() {
      document.getElementById('total_income').innerHTML = "Php {{ number_format($total_income, 2) }}";
      document.getElementById('total_income_for_aircon').innerHTML = "Php {{ number_format($total_income_for_aircon, 2) }}";
      document.getElementById('total_income_for_peripheral').innerHTML = "Php {{ number_format($total_income_for_peripheral, 2) }}";
   })
</script>
@endsection
