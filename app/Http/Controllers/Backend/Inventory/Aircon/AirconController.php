<?php

namespace App\Http\Controllers\Backend\Inventory\Aircon;

use App\Models\Inventory\Item\Aircon\Aircon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Aircon\AirconRepository;
use App\Http\Requests\Backend\Inventory\Aircon\ManageAirconRequest;
use App\Http\Requests\Backend\Inventory\Aircon\StoreAirconRequest;
use App\Http\Requests\Backend\Inventory\Aircon\UpdateAirconRequest;
use App\Http\Requests\Backend\Inventory\Aircon\ImportAirconExcelRequest;
use App\Http\Requests\Backend\Inventory\Aircon\LogPendingAirconRequest;

class AirconController extends Controller
{
   protected $aircons;

   public function __construct(AirconRepository $aircons)
   {
      $this->aircons = $aircons;
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageAirconRequest $request)
   {
      return view('backend.inventory.item.aircon.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('backend.inventory.item.aircon.create');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreAirconRequest $request)
   {
      $this->aircons->create([
         'data' => $request->only(
            'name',
            'serial_number',
            'manufacturer',
            'horsepower',
            'price',
            'voltage',
            'size',
            'brand_name',
            'feature',
            'status'
            )
         ]);

         return redirect()->route('admin.inventory.item.aircon.index')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.created'));
      }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function show(Aircon $aircon, ManageAirconRequest $request)
      {
         return view('backend.inventory.item.aircon.show')->withAircon($aircon);
      }

      /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function edit(Aircon $aircon, ManageAirconRequest $request)
      {
         return view('backend.inventory.item.aircon.edit')->withAircon($aircon);
      }

      /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function update(Aircon $aircon, UpdateAirconRequest $request)
      {
         $this->aircons->update($aircon,
         [
            'data' => $request->only(
               'name',
               'serial_number',
               'manufacturer',
               'horsepower',
               'price',
               'voltage',
               'size',
               'brand_name',
               'feature'
               )
            ]
         );

         return redirect()->route('admin.inventory.item.aircon.index')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.updated'));
      }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function destroy(Aircon $aircon, ManageAirconRequest $request)
      {
         $this->aircons->delete($aircon);

         return redirect()->route('admin.inventory.item.aircon.deleted')->withFlashSuccess(trans('alerts.backend.workflow.sales.deleted'));
      }

      public function importAirconExcel()
      {
         return view('backend.inventory.item.aircon.import');
      }

      public function import(Aircon $aircon, ImportAirconExcelRequest $request)
      {
         $this->aircons->import($aircon,
         [
            'data' => $request->only
            (
               'aircon_file'
            )
         ]);

         return redirect()->route('admin.inventory.item.aircon.import')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.uploaded'));
      }

      public function logPendingAircons()
      {
         return view('backend.inventory.item.aircon.log');
      }

      public function changeAirconLog(LogPendingAirconRequest $request)
      {
         $aircon = Aircon::whereSerialNumber($request->get('serial_number'))->first();
         $log = "";

         if($aircon->status == 2) {
            $aircon->update(['status' => 1]);

            $log = "checked-in.";
         } elseif ($aircon->status == 1) {
            $aircon->update(['status' => 0]);

            $log = "checked-out.";
         } elseif ($aircon->status == 0) {
            $aircon->update(['status' => 1]);

            $log = "checked-in.";
         }

         return redirect()->route('admin.inventory.item.aircon.log_pending_aircon')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.change_log', ['aircon' => $aircon->serial_number, 'changed_log' => $log]));
      }

      public function checkedOutAircon()
      {
         return view('backend.inventory.item.aircon.checked-out-aircons');
      }

      public function pendingAircons()
      {
         return view('backend.inventory.item.aircon.pending');
      }
   }
