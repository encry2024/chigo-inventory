@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.peripheral.management') . ' | ' . trans('labels.backend.inventory.peripheral.deleted'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.peripheral.management') }}
   <small>{{ trans('labels.backend.inventory.peripheral.deleted') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.peripheral.deleted') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.item.peripheral.includes.partials.peripheral-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="peripherals-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.id') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.description') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.serial_number') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.quantity') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.price') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.date_created') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.last_updated') }}</th>
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
   $('#peripherals-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.inventory.item.peripheral.get") }}',
         type: 'post',
         data: {trashed: true}
      },
      columns: [
         {data: 'id', name: '{{config('inventory.peripherals_table')}}.id'},
         {data: 'description', name: '{{config('inventory.peripherals_table')}}.description'},
         {data: 'serial_number', name: '{{config('inventory.peripherals_table')}}.serial_number'},
         {data: 'quantity', name: '{{config('inventory.peripherals_table')}}.quantity'},
         {data: 'price', name: '{{config('inventory.peripherals_table')}}.price'},
         {data: 'created_at', name: '{{config('inventory.peripherals_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('inventory.peripherals_table')}}.updated_at'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });

   $("body").on("click", "a[name='delete_peripheral_perm']", function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");

      swal({
         title: "{{ trans('strings.backend.general.are_you_sure') }}",
         text: "{{ trans('strings.backend.inventory.items.peripherals.delete_peripheral_confirm') }}",
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

   $("body").on("click", "a[name='restore_peripheral']", function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");

      swal({
         title: "{{ trans('strings.backend.general.are_you_sure') }}",
         text: "{{ trans('strings.backend.inventory.item.peripheral.restore_peripheral_confirm') }}",
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
