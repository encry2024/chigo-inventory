<?php

namespace App\Http\Controllers\Backend\Inventory\Referral;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Inventory\Referral\ReferralRepository;
use App\Http\Requests\Backend\Inventory\Referral\ManageReferralRequest;

/**
* Class ReferralTableController.
*/
class ReferralTableController extends Controller
{
   /**
   * @var UserRepository
   */
   protected $referrals;

   /**
   * @param UserRepository $users
   */
   public function __construct(ReferralRepository $referrals)
   {
      $this->referrals = $referrals;
   }
   /**
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageReferralRequest $request)
   {
      return Datatables::of(
         $this->referrals->getForDataTable($request->get('trashed')))
         ->escapeColumns(['name'])
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
