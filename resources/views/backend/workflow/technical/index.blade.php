@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.workflow.technical.management'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.workflow.technical.management') }}
   <small>{{ trans('labels.backend.workflow.technical.current_technicals') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.workflow.technical.current_technicals') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.workflow.technical.partials.technical-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="sales-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.workflow.technical.table.id') }}</th>
                  <th>{{ trans('labels.backend.workflow.technical.table.reference_id') }}</th>
                  <th>{{ trans('labels.backend.workflow.technical.table.technical_agent') }}</th>
                  <th>{{ trans('labels.backend.workflow.technical.table.customer_name') }}</th>
                  <th>{{ trans('labels.backend.workflow.technical.table.status') }}</th>
                  <th>{{ trans('labels.backend.workflow.technical.table.date_created') }}</th>
                  <th>{{ trans('labels.backend.workflow.technical.table.last_updated') }}</th>
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
      {!! history()->renderType('Technical') !!}
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
         url: '{{ route("admin.workflow.technical.get") }}',
         type: 'post',
         data: {trashed: false}
      },
      columns: [
         {data: 'id', name: '{{config('workflow.technicals_table')}}.id'},
         {data: 'reference_id', name: '{{config('workflow.technicals_table')}}.reference_id'},
         {data: 'user', name: '{{config('workflow.user_table')}}.last_name'},
         {data: 'customer', name: '{{config('workflow.customer_table')}}.company_name'},
         {data: 'status', name: '{{config('workflow.technicals_table')}}.status', searchable: false},
         {data: 'created_at', name: '{{config('workflow.technicals_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('workflow.technicals_table')}}.updated_at'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
