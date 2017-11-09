<?php

namespace App\Http\Controllers\Backend\Inventory\Referral;

use App\Models\Inventory\Referral\Referral;
use App\Models\Inventory\Referral\ReferralReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Referral\ReferralRepository;
use App\Http\Requests\Backend\Inventory\Referral\ManageReferralRequest;
use App\Http\Requests\Backend\Inventory\Referral\StoreReferralRequest;
use App\Http\Requests\Backend\Inventory\Referral\UpdateReferralRequest;
use DB;

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

   public function getReferralReport()
   {
      $referral_report = DB::table('referral_reports')
      ->select('referral_reports.*',
         DB::raw('COUNT("referral_reports.referral_id") as "total_referral"'),
         DB::raw('referral_reports.referral_id as "referral_id"'),
      'referrals.*',
         DB::raw('referrals.name as "referral_name"'),
         DB::raw('referrals.id as "ref_id"'))
      ->leftJoin('referrals', 'referral_reports.referral_id', '=', 'referrals.id')
      ->groupBy('referral_reports.referral_id')
      ->get();

      // dd($referral_report);

      return view('backend.inventory.referral.report', compact('referral_report'));
   }
}
