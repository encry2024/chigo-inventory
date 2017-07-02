@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.sale.management'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.sale.management') }}
   <small>{{ trans('labels.backend.workflow.sale.current_sales') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.workflow.sale.current_sales') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.workflow.sale.partials.sale-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="sales-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.workflow.sale.table.id') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.reference_number') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.customer_name') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.sales_agent') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.status') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.date_created') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.last_updated') }}</th>
                  <th>{{ trans('labels.general.actions') }}</th>
               </tr>
            </thead>
         </table>
      </div><!--table-responsive-->
   </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
      <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->
   <div class="box-body">
      {!! history()->renderType('Sale') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

<script>
$(function () {
   $('#sales-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.workflow.sale.get") }}',
         type: 'post',
         data: {status: 1, trashed: false}
      },
      columns: [
         {data: 'id', name: '{{config('workflow.sales_table')}}.id'},
         {data: 'reference_number', name: '{{config('workflow.sales_table')}}.name'},
         {data: 'customer_id', name: '{{config('workflow.sales_table')}}.customer_id'},
         {data: 'user_id', name: '{{config('workflow.sales_table')}}.user_id'},
         {data: 'status_id', name: '{{config('workflow.sales_table')}}.status'},
         {data: 'created_at', name: '{{config('workflow.sales_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('workflow.sales_table')}}.updated_at'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
