<?php

namespace App\Http\Controllers\Backend\Inventory\Referral;

use App\Models\Inventory\Referral\Referral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Referral\ReferralRepository;
use App\Http\Requests\Backend\Inventory\Referral\ManageReferralRequest;
use App\Http\Requests\Backend\Inventory\Referral\StoreReferralRequest;
use App\Http\Requests\Backend\Inventory\Referral\UpdateReferralRequest;

class ReferralController extends Controller
{
   protected $referrals;

   public function __construct(ReferralRepository $referrals)
   {
      $this->referrals = $referrals;
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      return view('backend.inventory.referral.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('backend.inventory.referral.create');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreReferralRequest $request)
   {
      $this->referrals->create([
         'data' => $request->only
         (
            'name',
            'address',
            'notes'
         )
      ]);

      return redirect()->route('admin.inventory.referral.index')->withFlashSuccess(trans('alerts.backend.inventory.referrals.created'));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Referral $referral, ManageReferralRequest $request)
   {
      return view('backend.inventory.referral.show')->withReferral($referral);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit(Referral $referral, ManageReferralRequest $request)
   {
      return view('backend.inventory.referral.edit')->withReferral($referral);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Referral $referral, UpdateReferralRequest $request)
   {
      $this->referrals->update($referral,
      [
         'data' => $request->only(
            'name',
            'address',
            'notes'
            )
         ]
      );

      return redirect()->route('admin.inventory.referral.index')->withFlashSuccess(trans('alerts.backend.inventory.referral.updated'));
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Referral $referral, ManageReferralRequest $request)
   {
      $this->referrals->delete($referral);

      return redirect()->route('admin.inventory.referral.deleted')->withFlashSuccess(trans('alerts.backend.inventory.referral.deleted'));
   }
}
