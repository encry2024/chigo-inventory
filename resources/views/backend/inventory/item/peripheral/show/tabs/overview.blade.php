<table class="table table-striped table-hover">

   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.description') }}</th>
      <td>{{ $peripheral->description }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.serial_number') }}</th>
      <td>{{ $peripheral->serial_number }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.quantity') }}</th>
      <td>{{ $peripheral->quantity }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.price') }}</th>
      <td>{{ $peripheral->price }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.created_at') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($peripheral->created_at)) }} ({{ $peripheral->created_at->diffForHumans() }})</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.last_updated') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($peripheral->updated_at)) }} ({{ $peripheral->updated_at->diffForHumans() }})</td>
   </tr>

   @if ($peripheral->trashed())
   <tr>
      <th>{{ trans('labels.backend.inventory.peripheral.tabs.content.overview.deleted_at') }}</th>
      <td>{{ date('F d, Y H:I A', strtotime($peripheral->deleted_at)) }} ({{ $peripheral->deleted_at->diffForHumans() }})</td>
   </tr>
   @endif
</table>
