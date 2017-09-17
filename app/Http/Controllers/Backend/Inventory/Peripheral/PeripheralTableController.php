<?php

namespace App\Http\Controllers\Backend\Inventory\Peripheral;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Inventory\Peripheral\PeripheralRepository;
use App\Http\Requests\Backend\Inventory\Peripheral\ManagePeripheralRequest;

/**
* Class PeripheralTableController.
*/
class PeripheralTableController extends Controller
{
   /**
   * @var UserRepository
   */
   protected $peripherals;

   /**
   * @param UserRepository $users
   */
   public function __construct(PeripheralRepository $peripherals)
   {
      $this->peripherals = $peripherals;
   }

   /**
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManagePeripheralRequest $request)
   {
      return Datatables::of(
         $this->peripherals->getForDataTable($request->get('trashed')))
         ->escapeColumns(['description', 'serial_number'])
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
