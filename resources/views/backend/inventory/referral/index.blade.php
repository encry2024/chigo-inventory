@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.inventory.referral.management'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.referral.management') }}
   <small>{{ trans('labels.backend.inventory.referral.availables') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.referral.availables') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.referral.includes.partials.referral-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="referral-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.inventory.referral.table.id') }}</th>
                  <th>{{ trans('labels.backend.inventory.referral.table.name') }}</th>
                  <th>{{ trans('labels.backend.inventory.referral.table.note') }}</th>
                  <th>{{ trans('labels.backend.inventory.referral.table.created_at') }}</th>
                  <th>{{ trans('labels.backend.inventory.referral.table.updated_at') }}</th>
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
   {!! history()->renderType('Referral') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

<script>
$(function () {
   $('#referral-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: '{{ route("admin.inventory.referral.get") }}',
         type: 'post',
         data: {trashed: false}
      },
      columns: [
         {data: 'id', name: '{{config('inventory.referrals_table')}}.id'},
         {data: 'name', name: '{{config('inventory.referrals_table')}}.name'},
         {data: 'notes', name: '{{config('inventory.referrals_table')}}.notes'},
         {data: 'created_at', name: '{{config('inventory.referrals_table')}}.created_at'},
         {data: 'updated_at', name: '{{config('inventory.referrals_table')}}.updated_at'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
