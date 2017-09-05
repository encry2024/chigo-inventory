<table class="table table-striped table-hover">
   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.reference_number') }}</th>
      <td>{{ $sale->reference_number }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.customer_name') }}</th>
      <td>{{ $sale->customer->company_name }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.sales_agent') }}</th>
      <td>{{ $sale->user->full_name }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.aircons') }}</th>

      <td>
      @foreach($sale->aircon_sales as $aircon_sale)
         {{ $aircon_sale->aircon->name }} - {{ $aircon_sale->aircon->serial_number }} - {{ $aircon_sale->aircon->door_type }}
         <br>
      @endforeach
      </td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.note') }}</th>
      <td>{{ $sale->note }}</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.date_created') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($sale->created_at)) }} ({{ $sale->created_at->diffForHumans() }})</td>
   </tr>

   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.last_updated') }}</th>
      <td>{{ date('F d, Y h:i A', strtotime($sale->updated_at)) }} ({{ $sale->updated_at->diffForHumans() }})</td>
   </tr>

   @if ($sale->trashed())
   <tr>
      <th>{{ trans('labels.backend.workflow.sale.tabs.content.overview.deleted_at') }}</th>
      <td>{{ date('F d, Y H:I A', strtotime($sale->deleted_at)) }} ({{ $sale->deleted_at->diffForHumans() }})</td>
   </tr>
   @endif
</table>
