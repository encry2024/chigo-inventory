<table class="table table-striped table-hover">
   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.company_name') }}</th>
      <td>{{ $customer->company_name }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.email') }}</th>
      <td>{{ $customer->email }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.address') }}</th>
      <td>{{ $customer->address }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.note') }}</th>
      <td>{{ $customer->note }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.created_at') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($customer->created_at)) }} ({{ $customer->created_at->diffForHumans() }})</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.last_updated') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($customer->updated_at)) }} ({{ $customer->updated_at->diffForHumans() }})</td>
   </tr>

   @if ($customer->trashed())
   <tr>
      <th>{{ trans('labels.backend.inventory.customer.tabs.content.overview.deleted_at') }}</th>
      <td>{{ date('F d, Y H:I A', strtotime($customer->deleted_at)) }} ({{ $customer->deleted_at->diffForHumans() }})</td>
   </tr>
   @endif
</table>
