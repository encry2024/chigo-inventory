<?php

namespace App\Http\Controllers\Backend\Workflow\Sale;

use App\Models\Workflow\Sale\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Workflow\Sale\SaleRepository;
use App\Http\Requests\Backend\Workflow\Sale\ManageSalesWorkflowRequest;
use App\Http\Requests\Backend\Workflow\Sale\StoreSalesWorkflowRequest;
use App\Models\Inventory\Customer\Customer;
use App\Models\Inventory\Item\Aircon\Aircon;

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

      return view('backend.workflow.sale.create', compact('customers', 'aircons'));
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
            'date_needed'
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
}
