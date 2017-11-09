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
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">Sales Report - Total Income Sales Workflow</h3>
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="sales-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.inventory.referral.table.id') }}</th>
                  <th>{{ trans('labels.backend.inventory.referral.table.name') }}</th>
                  <th>{{ trans('labels.backend.inventory.referral.table.total_referrals') }}</th>
               </tr>
            </thead>

            <tbody>
               @foreach($referral_report as $referral)
                  @if($referral->referral_id == 0)
                  <tr>
                     <td><label class="label label-danger">No Referral</label></td>
                     <td><label class="label label-danger">No Referral</label></td>
                     <td>{{ $referral->total_referral }}</td>
                  </tr>
                  @else
                  <tr>
                     <td>{{ $referral->referral_id }}</td>
                     <td>{{ $referral->referral_name}}</td>
                     <td>{{ $referral->total_referral }}</td>
                  </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div><!--table-responsive-->
   </div><!-- /.box-body -->
</div><!--box-->
@endsection
