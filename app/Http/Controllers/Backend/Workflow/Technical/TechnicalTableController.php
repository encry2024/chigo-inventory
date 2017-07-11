<?php

namespace App\Http\Controllers\Backend\Workflow\Technical;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Backend\Workflow\Technical\ManageTechnicalWorkflowRequest;
use App\Repositories\Backend\Workflow\Technical\TechnicalRepository;

class TechnicalTableController extends Controller
{
   /**
   * @var UserRepository
   */
   protected $technicals;

   /**
   * @param UserRepository $users
   */
   public function __construct(TechnicalRepository $technicals)
   {
      $this->technicals = $technicals;
   }

   /**
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageTechnicalWorkflowRequest $request)
   {
      return Datatables::of(
         $this->technicals->getForDataTable($request->get('trashed')))
         ->escapeColumns([])
         ->addColumn('user', function ($technical) {
            return $technical->user->count() ?
            $technical->user->full_name :
            trans('labels.general.none');
         })
         ->addColumn('customer', function ($technical) {
            return $technical->customer->count() ?
            $technical->customer->company_name :
            trans('labels.general.none');
         })
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
