<?php

namespace App\Http\Controllers\Backend\Workflow\Technical;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Workflow\Technical\ManageTechnicalWorkflowRequest;
use App\Repositories\Backend\Workflow\Technical\TechnicalRepository;
use App\Http\Requests\Backend\Workflow\Technical\StoreTechnicalWorkflowRequest;
use App\Models\Inventory\Customer\Customer;
use App\Models\Inventory\Technician\Technician;
use Session;
use App\Models\Workflow\Technical\Technical;
use DB;

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
   //

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create($schedule, Technical $technical)
   {
      $customers              = Customer::all();

      $schedule               = explode("&", $schedule);
      $startSchedule          = date("Y/m/d-H:i", strtotime($schedule[0]));
      $endSchedule            = date("Y/m/d-H:i", strtotime($schedule[1]));

      // Get start schedule date
      $getStartScheduleDate   = explode('-', $startSchedule);
      $startScheduleDate      = date('Y-m-d', strtotime($getStartScheduleDate[0]));
      $startScheduleTime      = date('H:i', strtotime($getStartScheduleDate[1]));

      // Get end schedule date
      $getEndScheduleDate     = explode('-', $endSchedule);
      $endScheduleDate        = date('Y-m-d', strtotime($getEndScheduleDate[0]));
      $endScheduleTime        = date('H:i', strtotime($getEndScheduleDate[1]));

      // Query available Technicians
      $techniciansId = DB::table('technicians')
      ->join('technicals', function ($join)  {
         $join->on('technicians.id', '=', 'technicals.technician_id');
      })
      ->where('technicals.end_date_schedule', '=' , $endScheduleDate)
      ->whereBetween('technicals.end_time_schedule', array($startScheduleTime, $endScheduleTime))
      ->pluck('technicals.technician_id');


      // Fetch all the technicians that is not equal to the given id's
      $technicians = DB::table('technicians')->whereNotIn('id', $techniciansId)->get();

      // dd($technicians);

      return view('backend.workflow.technical.create', compact('technicians', 'customers', 'startScheduleDate', 'startScheduleTime', 'endScheduleDate', 'endScheduleTime'));
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreTechnicalWorkflowRequest $request)
   {
      $this->technicals->create([
         'data' => $request->only(
            'technician',
            'customer',
            'note',
            'start_date_schedule',
            'start_time_schedule',
            'end_date_schedule',
            'end_time_schedule'
            )
         ]);

         return redirect()->route('admin.workflow.technical.index')->withFlashSuccess(trans('alerts.backend.workflow.technicals.created'));
      }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function show(Technical $technical, ManageTechnicalWorkflowRequest $request)
      {
         return view('backend.workflow.technical.view')->withTechnical($technical);
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

      public function fetchTechnicalSchedules()
      {
         $jsonData = array();
         $technicals = Technical::all();

         foreach($technicals as $technical) {
            $jsonData[] = array(
               'title'  => $technical->customer->company_name,
               'start'  => $technical->start_date_schedule . ' ' . date('H:i:s', strtotime($technical->start_time_schedule)),
               'end'    => $technical->end_date_schedule . ' ' . date('H:i:s', strtotime($technical->end_time_schedule)),
               'url'    => route('admin.workflow.technical.show', $technical->id)
            );
         }

         return json_encode($jsonData);
      }
   }
