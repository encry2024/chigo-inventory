<?php

namespace App\Http\Controllers\Backend\Inventory\Referral;

use App\Models\Inventory\Referral\Referral;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Referral\ReferralRepository;
use App\Http\Requests\Backend\Inventory\Referral\ManageReferralRequest;

/**
* Class ReferralStatusController.
*/
class ReferralStatusController extends Controller
{
   /**
   * @var ReferralRepository
   */
   protected $referrals;

   /**
   * @param ReferralRepository $referrals
   */
   public function __construct(ReferralRepository $referrals)
   {
      $this->referrals = $referrals;
   }

   /**
   * @param ManageReferralRequest $request
   *
   * @return mixed
   */
   public function getDeleted(ManageReferralRequest $request)
   {
      return view('backend.inventory.referral.deleted');
   }

   /**
   * @param User              $deletedUser
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function delete(Referral $deleteReferral, ManageReferralRequest $request)
   {
      $this->referrals->forceDelete($deleteReferral);

      return redirect()->route('admin.inventory.referral.deleted')->withFlashSuccess(trans('alerts.backend.inventory.referral.deleted_permanently'));
   }

   /**
   * @param User              $deleteReferral
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function restore(Referral $deleteReferral, ManageReferralRequest $request)
   {
      $this->referrals->restore($deleteReferral);

      return redirect()->route('admin.inventory.referral.index')->withFlashSuccess(trans('alerts.backend.inventory.referral.restored'));
   }
}
