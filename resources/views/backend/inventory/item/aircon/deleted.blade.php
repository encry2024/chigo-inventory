@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.aircon.management') . ' | ' . trans('labels.backend.inventory.aircon.deleted'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.aircon.management') }}
   <small>{{ trans('labels.backend.inventory.aircon.deleted') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.aircon.deleted') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.access.includes.partials.aircon-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="aircons-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.inventory.aircon.table.id') }}</th>
                  <th>{{ trans('labels.backend.inventory.aircon.table.name') }}</th>
                  <th>{{ trans('labels.backend.inventory.aircon.table.serial_number') }}</th>
                  <th>{{ trans('labels.backend.inventory.aircon.table.status') }}</th>
                  <th>{{ trans('labels.backend.inventory.aircon.table.date_created') }}</th>
                  <th>{{ trans('labels.backend.inventory.aircon.table.last_updated') }}</th>
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
   $('#aircons-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.inventory.item.aircon.get") }}',
         type: 'post',
         data: {status: false, trashed: true}
      },
      columns: [
         {data: 'id', name: '{{config('inventory.aircons_table')}}.id'},
         {data: 'name', name: '{{config('inventory.aircons_table')}}.name'},
         {data: 'serial_number', name: '{{config('inventory.aircons_table')}}.serial_number'},
         {data: 'status', name: '{{config('inventory.aircons_table')}}.status'},
         {data: 'created_at', name: '{{config('inventory.aircons_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('inventory.aircons_table')}}.updated_at'},
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
         text: "{{ trans('strings.backend.inventory.items.aircons.delete_aircon_confirm') }}",
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

   $("body").on("click", "a[name='restore_user']", function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");

      swal({
         title: "{{ trans('strings.backend.general.are_you_sure') }}",
         text: "{{ trans('strings.backend.access.users.restore_user_confirm') }}",
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
