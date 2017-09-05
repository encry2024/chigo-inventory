<table class="table table-striped table-hover">
   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.name') }}</th>
      <td>{{ $technician->name }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.email') }}</th>
      <td>{{ $technician->email }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.address') }}</th>
      <td>{{ $technician->address }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.status') }}</th>
      <td>{{ $technician->status }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.created_at') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($technician->created_at)) }} ({{ $technician->created_at->diffForHumans() }})</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.last_updated') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($technician->updated_at)) }} ({{ $technician->updated_at->diffForHumans() }})</td>
   </tr>

   @if ($technician->trashed())
   <tr>
      <th>{{ trans('labels.backend.inventory.technician.tabs.content.overview.deleted_at') }}</th>
      <td>{{ date('F d, Y H:I A', strtotime($technician->deleted_at)) }} ({{ $technician->deleted_at->diffForHumans() }})</td>
   </tr>
   @endif
</table>
