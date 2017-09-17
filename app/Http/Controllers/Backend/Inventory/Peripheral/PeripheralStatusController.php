<?php

namespace App\Http\Controllers\Backend\Inventory\Peripheral;

use App\Models\Inventory\Item\Peripheral\Peripheral;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Peripheral\PeripheralRepository;
use App\Http\Requests\Backend\Inventory\Peripheral\ManagePeripheralRequest;

/**
* Class PeripheralStatusController.
*/
class PeripheralStatusController extends Controller
{
   /**
   * @var PeripheralRepository
   */
   protected $peripherals;

   /**
   * @param PeripheralRepository $peripherals
   */
   public function __construct(PeripheralRepository $peripherals)
   {
      $this->peripherals = $peripherals;
   }

   /**
   * @param ManagePeripheralRequest $request
   *
   * @return mixed
   */
   public function getDeleted(ManagePeripheralRequest $request)
   {
      return view('backend.inventory.item.peripheral.deleted');
   }

   /**
   * @param User              $deletedUser
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function delete(Peripheral $deletePeripheral, ManagePeripheralRequest $request)
   {
      $this->peripherals->forceDelete($deletePeripheral);

      return redirect()->route('admin.inventory.item.peripheral.deleted')->withFlashSuccess(trans('alerts.backend.inventory.items.peripherals.deleted_permanently'));
   }

   /**
   * @param User              $deletePeripheral
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function restore(Peripheral $deletePeripheral, ManagePeripheralRequest $request)
   {
      $this->peripherals->restore($deletePeripheral);

      return redirect()->route('admin.inventory.item.peripheral.index')->withFlashSuccess(trans('alerts.backend.inventory.items.peripherals.restored'));
   }
}
