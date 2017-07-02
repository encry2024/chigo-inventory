<?php

namespace App\Http\Controllers\Backend\Workflow\Sale;

use App\Models\Workflow\Sale\Sale;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Workflow\Sale\SaleRepository;
use App\Http\Requests\Backend\Workflow\Sale\ManageSalesWorkflowRequest;

/**
* Class AirconTableController.
*/
class SaleTableController extends Controller
{
   /**
   * @var UserRepository
   */
   protected $sales;

   /**
   * @param UserRepository $users
   */
   public function __construct(SaleRepository $sales)
   {
      $this->sales = $sales;
   }

   /**
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageSalesWorkflowRequest $request)
   {
      return Datatables::of(
         $this->sales->getForDataTable($request->get('status'), $request->get('trashed')))
         ->escapeColumns(['reference_number'])
         ->editColumn('status', function ($sale) {
            return $sale->active_label;
         })
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
