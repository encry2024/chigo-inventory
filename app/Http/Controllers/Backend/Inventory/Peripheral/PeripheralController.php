<?php

namespace App\Http\Controllers\Backend\Inventory\Peripheral;

use App\Models\Inventory\Item\Peripheral\Peripheral;
use App\Models\Inventory\Customer\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Peripheral\PeripheralRepository;
use App\Http\Requests\Backend\Inventory\Peripheral\ManagePeripheralRequest;
use App\Http\Requests\Backend\Inventory\Peripheral\StorePeripheralRequest;
use App\Http\Requests\Backend\Inventory\Peripheral\UpdatePeripheralRequest;

class PeripheralController extends Controller
{
   protected $peripherals;

   public function __construct(PeripheralRepository $peripherals)
   {
      $this->peripherals = $peripherals;
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManagePeripheralRequest $request)
   {
      return view('backend.inventory.item.peripheral.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('backend.inventory.item.peripheral.create');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StorePeripheralRequest $request)
   {
      $this->peripherals->create([
      'data' => $request->only(
         'serial_number',
         'quantity',
         'description',
         'price'
         )
      ]);

      return redirect()->route('admin.inventory.item.peripheral.index')->withFlashSuccess(trans('alerts.backend.inventory.items.peripherals.created'));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Peripheral $peripheral, ManagePeripheralRequest $request)
   {
      return view('backend.inventory.item.peripheral.show')->withPeripheral($peripheral);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit(Peripheral $peripheral, ManagePeripheralRequest $request)
   {
      return view('backend.inventory.item.peripheral.edit')->withPeripheral($peripheral);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Peripheral $peripheral, UpdatePeripheralRequest $request)
   {
      $this->peripherals->update($peripheral,
      [
         'data' => $request->only(
            'description',
            'serial_number',
            'quantity',
            'price'
            )
         ]
      );

      return redirect()->route('admin.inventory.item.peripheral.index')->withFlashSuccess(trans('alerts.backend.inventory.items.peripherals.updated'));
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Peripheral $peripheral, ManagePeripheralRequest $request)
   {
      $this->peripherals->delete($peripheral);

      return redirect()->route('admin.inventory.item.peripheral.deleted')->withFlashSuccess(trans('alerts.backend.inventory.items.peripherals.deleted'));
   }

   public function getSelectedPeripheralName(Peripheral $peripheral)
   {
      return json_encode($peripheral->description);
   }
}
