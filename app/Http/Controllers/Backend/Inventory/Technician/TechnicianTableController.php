<?php

namespace App\Http\Controllers\Backend\Inventory\Technician;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Inventory\Technician\TechnicianRepository;
use App\Http\Requests\Backend\Inventory\Technician\ManageTechnicianRequest;

class TechnicianTableController extends Controller
{
   protected $technicians;

   /**
   * @param UserRepository $users
   */
   public function __construct(TechnicianRepository $technicians)
   {
      $this->technicians = $technicians;
   }

   /**
   * @param ManageTechnicianRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageTechnicianRequest $request)
   {
      return Datatables::of(
         $this->technicians->getForDataTable($request->get('status'), $request->get('trashed')))
         ->escapeColumns([])
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
