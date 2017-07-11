<?php

namespace App\Http\Controllers\Backend\Workflow\Sale;

use App\Models\Workflow\Sale\Sale;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Workflow\Sale\SaleRepository;
use App\Http\Requests\Backend\Workflow\Sale\ManageSalesWorkflowRequest;

/**
* Class SaleStatusController.
*/
class SaleStatusController extends Controller
{
   /**
   * @var SaleRepository
   */
   protected $sales;

   /**
   * @param SaleRepository $sales
   */
   public function __construct(SaleRepository $sales)
   {
      $this->sales = $sales;
   }

   /**
   * @param ManageSaleRequest $request
   *
   * @return mixed
   */
   public function getDeleted(ManageSalesWorkflowRequest $request)
   {
      return view('backend.workflow.sale.deleted');
   }

   /**
   * @param User              $deletedUser
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function delete(Sale $deleteSale, ManageSalesWorkflowRequest $request)
   {
      $this->sales->forceDelete($deleteSale);

      return redirect()->route('admin.workflow.sale.deleted')->withFlashSuccess(trans('alerts.backend.workflow.sale.deleted_permanently'));
   }

   /**
   * @param User              $deleteSale
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function restore(Sale $deleteSale, ManageSalesWorkflowRequest $request)
   {
      $this->sales->restore($deleteSale);

      return redirect()->route('admin.workflow.sale.index')->withFlashSuccess(trans('alerts.backend.workflow.sales.restored'));
   }
}
