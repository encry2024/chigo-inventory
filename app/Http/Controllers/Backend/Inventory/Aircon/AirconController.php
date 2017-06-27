<?php

namespace App\Http\Controllers\Backend\Inventory\Aircon;

use App\Models\Inventory\Item\Aircon\Aircon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Aircon\AirconRepository;
use App\Http\Requests\Backend\Inventory\Aircon\ManageAirconRequest;
use App\Http\Requests\Backend\Inventory\Aircon\StoreAirconRequest;

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
      public function destroy(Aircon $aircon, ManageAirconRequest $request)
      {
         $this->aircons->delete($aircon);

         return redirect()->route('admin.inventory.item.aircon.deleted')->withFlashSuccess(trans('alerts.backend.inventory.items.aircons.deleted'));
      }
   }
