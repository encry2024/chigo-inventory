<?php

namespace App\Http\Controllers\Backend\Inventory\Aircon;

use App\Models\Inventory\Item\Aircon\Aircon;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Aircon\AirconRepository;
use App\Http\Requests\Backend\Inventory\Aircon\ManageAirconRequest;

/**
* Class AirconStatusController.
*/
class AirconStatusController extends Controller
{
   /**
   * @var AirconRepository
   */
   protected $aircons;

   /**
   * @param AirconRepository $aircons
   */
   public function __construct(AirconRepository $aircons)
   {
      $this->aircons = $aircons;
   }

   /**
   * @param ManageAirconRequest $request
   *
   * @return mixed
   */
   public function getDeleted(ManageAirconRequest $request)
   {
      return view('backend.inventory.item.aircon.deleted');
   }

   /**
   * @param User              $deletedUser
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function delete(Aircon $deleteAircon, ManageAirconRequest $request)
   {
      $this->aircons->forceDelete($deleteAircon);

      return redirect()->route('admin.inventory.item.aircon.deleted')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.deleted_permanently'));
   }

   /**
   * @param User              $deleteAircon
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function restore(Aircon $deleteAircon, ManageAirconRequest $request)
   {
      $this->aircons->restore($deleteAircon);

      return redirect()->route('admin.inventory.item.aircon.index')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.restored'));
   }
}
