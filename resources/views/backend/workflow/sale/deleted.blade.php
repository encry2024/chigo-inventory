@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.sale.management') . ' | ' . trans('labels.backend.workflow.sale.deleted'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.sale.management') }}
   <small>{{ trans('labels.backend.workflow.sale.deleted') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.workflow.sale.deleted') }}</h3>

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
                  <th>{{ trans('labels.backend.workflow.sale.table.sales_agent') }}</th>
                  <th>{{ trans('labels.backend.workflow.sale.table.customer_name') }}</th>
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
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

<script>
$(function() {
   $('#sales-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.workflow.sale.get") }}',
         type: 'post',
         data: {status: false, trashed: true}
      },
      columns: [
         {data: 'id', name: '{{config('workflow.sale_config.sales_table')}}.id'},
         {data: 'reference_number', name: '{{config('workflow.sale_config.sales_table')}}.reference_number'},
         {data: 'user', name: '{{config('workflow.sale_config.user_table')}}.jl'},
         {data: 'customer', name: '{{config('workflow.sale_config.customer_table')}}.company_name'},
         {data: 'status', name: '{{config('workflow.sale_config.sales_table')}}.status', searchable: false},
         {data: 'created_at', name: '{{config('workflow.sale_config.sales_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('workflow.sale_config.sales_table')}}.updated_at'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });

   $("body").on("click", "a[name='delete_user_perm']", function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");

      swal({
         title: "{{ trans('strings.backend.general.are_you_sure') }}",
         text: "{{ trans('strings.backend.workflows.sales.delete_aircon_confirm') }}",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
         cancelButtonText: "{{ trans('buttons.general.cancel') }}",
         closeOnConfirm: false
      }, function(isConfirmed){
         if (isConfirmed){
            window.location.href = linkURL;
         }
      });
   });

   $("body").on("click", "a[name='restore_sale']", function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");

      swal({
         title: "{{ trans('strings.backend.general.are_you_sure') }}",
         text: "{{ trans('strings.backend.workflow.sale.restore_sale_confirm') }}",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
         cancelButtonText: "{{ trans('buttons.general.cancel') }}",
         closeOnConfirm: false
      }, function(isConfirmed){
         if (isConfirmed){
            window.location.href = linkURL;
         }
      });
   });
});
</script>
@endsection
