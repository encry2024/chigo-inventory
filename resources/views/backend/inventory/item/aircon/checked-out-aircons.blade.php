@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.aircon.management'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.aircon.management') }}
   <small>{{ trans('labels.backend.inventory.aircon.availables') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.aircon.availables') }}</h3>

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

<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
      <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->
   <div class="box-body">
      {!! history()->renderType('Aircon') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

<script>
$(function () {
   $('#aircons-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.inventory.item.aircon.get") }}',
         type: 'post',
         data: {status: 0, trashed: false}
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
});
</script>
@endsection
