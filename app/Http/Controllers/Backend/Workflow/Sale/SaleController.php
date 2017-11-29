<?php

namespace App\Http\Controllers\Backend\Workflow\Sale;

use App\Models\Workflow\Sale\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Workflow\Sale\SaleRepository;
use App\Http\Requests\Backend\Workflow\Sale\ManageSalesWorkflowRequest;
use App\Http\Requests\Backend\Workflow\Sale\StoreSalesWorkflowRequest;
use App\Models\Inventory\Customer\Customer;
use App\Models\Inventory\Customer\CustomerService;
use App\Models\Inventory\Item\Aircon\Aircon;
use App\Models\Inventory\Item\Peripheral\Peripheral;
use App\Models\Inventory\Referral\Referral;
use App\Models\Inventory\Referral\ReferralReport;

/**
 * Class SaleController
 */

class SaleController extends Controller
{

   protected $sales;

   public function __construct(SaleRepository $sales)
   {
      $this->sales = $sales;
   }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageSalesWorkflowRequest $request)
   {
      return view('backend.workflow.sale.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $customers = Customer::all();
      $aircons = Aircon::whereCustomerId(0)->get();
      $referrals = Referral::all();
      $peripherals = Peripheral::all();

      return view('backend.workflow.sale.create', compact('customers', 'aircons', 'referrals', 'peripherals'));
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreSalesWorkflowRequest $request)
   {
      $this->sales->create([
         'data' => $request->only(
            'customer',
            'user_id',
            'aircon',
            'note',
            'terms',
            'date_needed',
            'getPeripherals'
            )
         ]
      );

      return redirect()->route('admin.workflow.sale.index')->withFlashSuccess(trans('alerts.backend.workflow.sales.created'));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Sale $sale, ManageSalesWorkflowRequest $request)
   {
        return view('backend.workflow.sale.show')->withSale($sale);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      //
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
      //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Sale $sale, ManageSalesWorkflowRequest $request)
   {
      $this->sales->delete($sale);

      return redirect()->route('admin.inventory.workflow.sale.deleted')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.deleted'));
   }

   /**
   * Update sale's status
   *
   * @param  Sale $sale
   * @return \Illuminate\Http\Response
   */
   public function updateStatus(Sale $sale, ManageSalesWorkflowRequest $request)
   {
      $sale->status = $request->get('status');

      if($sale->save()) {
         if($sale->status == 2) {
            $referral_report = new ReferralReport();
            $referral_report->sale_id = $sale->id;
            $referral_report->referral_id = $sale->customer->referral_id ? $sale->customer->referral_id : 0 ;
            $referral_report->save();
         }
      }

      $customer_service = new CustomerService();
      $customer_service->sale_id = $sale->id;
      $customer_service->service_date = date("Y-m-d", strtotime($sale->customer->customer_type->time_before_service));
      $customer_service->save();

      return redirect()->back()->withFlashSuccess('Sale\'s status was successfully updated.');
   }

   /**
   * Get sale's delivery
   *
   */
   public function fetchDeliverySales()
   {
      $jsonData = array();
      $sales = Sale::all();

      foreach($sales as $sale) {
         $jsonData[] = array(
            'title'  => $sale->customer->company_name,
            'start'  => $sale->date_needed,
            'url'    => route('admin.workflow.sale.for_checkout', $sale->id)
         );
      }

      return json_encode($jsonData);
   }

   /**
   * Show sale's for cheack-out
   *
   */
   public function saleForCheckout(Sale $sale)
   {
      return view('backend.workflow.sale.delivery_receipt')->withSale($sale);
   }

   /**
   * Generate gatepass
   *
   */
   public function generateGatepass()
   {
      $sales = Sale::with(['aircon_sales.aircon'])->where('date_needed', date('Y-m-d'))->get();

      return view('backend.workflow.sale.gatepass', compact('sales'));
   }

   public function getSaleReport()
   {
      $sales = Sale::whereStatus(2)->get();

      return view('backend.workflow.sale.report', compact('sales'));
   }
}
