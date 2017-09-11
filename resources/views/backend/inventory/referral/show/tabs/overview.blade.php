<table class="table table-striped table-hover">
   <tr>
      <th>{{ trans('labels.backend.inventory.referral.tabs.content.overview.name') }}</th>
      <td>{{ $referral->name }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.referral.tabs.content.overview.address') }}</th>
      <td>{{ $referral->address }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.referral.tabs.content.overview.notes') }}</th>
      <td>{{ $referral->notes }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.referral.tabs.content.overview.created_at') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($referral->created_at)) }} ({{ $referral->created_at->diffForHumans() }})</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.inventory.referral.tabs.content.overview.last_updated') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($referral->updated_at)) }} ({{ $referral->updated_at->diffForHumans() }})</td>
   </tr>

   @if ($referral->trashed())
   <tr>
      <th>{{ trans('labels.backend.inventory.referral.tabs.content.overview.deleted_at') }}</th>
      <td>{{ date('F d, Y H:I A', strtotime($referral->deleted_at)) }} ({{ $referral->deleted_at->diffForHumans() }})</td>
   </tr>
   @endif
</table>
