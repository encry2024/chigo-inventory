<?php

namespace App\Http\Controllers\Backend\Workflow\Technical;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Workflow\Technical\ManageTechnicalWorkflowRequest;
use App\Repositories\Backend\Workflow\Technical\TechnicalRepository;
use App\Http\Requests\Backend\Workflow\Technical\StoreTechnicalsWorkflowRequest;
use App\Models\Inventory\Customer\Customer;
use Session;

class TechnicalController extends Controller
{
   protected $technicals;

   public function __construct(TechnicalRepository $technicals)
   {
      $this->technicals = $technicals;
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageTechnicalWorkflowRequest $request)
   {
      return view('backend.workflow.technical.index');
   }

   //
   public function validateDateTime()
   {
      return view('backend.workflow.technical.validate_schedule');
   }

   public function confirmSchedules(ManageTechnicalWorkflowRequest $request)
   {
      return redirect()->route('admin.workflow.technical.create')->with('from', $request->get('from'))->with('to', $request->get('to'));
   }
   //

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create(Customer $customer)
   {
      dd(session::get('from'));
      // return view('backend.workflow.technical.create', compact('customer'));
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      //
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
      //
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      //
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
      //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      //
   }
}
