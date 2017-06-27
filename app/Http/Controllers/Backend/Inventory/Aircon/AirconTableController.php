<?php

namespace App\Http\Controllers\Backend\Inventory\Aircon;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Inventory\Aircon\AirconRepository;
use App\Http\Requests\Backend\Inventory\Aircon\ManageAirconRequest;

/**
* Class AirconTableController.
*/
class AirconTableController extends Controller
{
   /**
   * @var UserRepository
   */
   protected $aircons;

   /**
   * @param UserRepository $users
   */
   public function __construct(AirconRepository $aircons)
   {
      $this->aircons = $aircons;
   }

   /**
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageAirconRequest $request)
   {
      return Datatables::of(
         $this->aircons->getForDataTable($request->get('status'), $request->get('trashed')))
         ->escapeColumns(['name', 'serial_number'])
         ->editColumn('status', function ($aircon) {
            return $aircon->active_label;
         })
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
