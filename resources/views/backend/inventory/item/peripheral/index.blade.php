@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.peripheral.management'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.peripheral.management') }}
   <small>{{ trans('labels.backend.inventory.peripheral.availables') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.peripheral.availables') }}</h3>

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
                  <th>{{ trans('labels.backend.inventory.peripheral.table.price') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.quantity') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.date_created') }}</th>
                  <th>{{ trans('labels.backend.inventory.peripheral.table.last_updated') }}</th>
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
      {!! history()->renderType('Peripheral') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

<script>
$(function () {
   $('#peripherals-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.inventory.item.peripheral.get") }}',
         type: 'post',
         data: {trashed: false}
      },
      columns: [
         {data: 'id', name: '{{config('inventory.peripherals_table')}}.id'},
         {data: 'description', name: '{{config('inventory.peripherals_table')}}.description'},
         {data: 'serial_number', name: '{{config('inventory.peripherals_table')}}.serial_number'},
         {data: 'price', name: '{{config('inventory.peripherals_table')}}.price'},
         {data: 'quantity', name: '{{config('inventory.peripherals_table')}}.quantity'},
         {data: 'created_at', name: '{{config('inventory.peripherals_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('inventory.peripherals_table')}}.updated_at'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
