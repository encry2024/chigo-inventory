<table class="table table-striped table-hover">

   <tr>
      <th>{{ trans('labels.backend.inventory.aircon.tabs.content.overview.name') }}</th>
      <td>{{ $aircon->name }}</td>
   </tr>
   <tr>
      <th>{{ trans('labels.backend.inventory.aircon.tabs.content.overview.status') }}</th>
      <td>{!! $aircon->active_label !!}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.aircon.tabs.content.overview.created_at') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($aircon->created_at)) }} ({{ $aircon->created_at->diffForHumans() }})</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.aircon.tabs.content.overview.last_updated') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($aircon->updated_at)) }} ({{ $aircon->updated_at->diffForHumans() }})</td>
   </tr>

   @if ($aircon->trashed())
   <tr>
      <th>{{ trans('labels.backend.inventory.aircon.tabs.content.overview.deleted_at') }}</th>
      <td>{{ date('F d, Y H:I A', strtotime($aircon->deleted_at)) }} ({{ $aircon->deleted_at->diffForHumans() }})</td>
   </tr>
   @endif
</table>
