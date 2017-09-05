<?php

namespace App\Http\Controllers\Backend\Inventory\Technician;

use App\Models\Inventory\Technician\Technician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Technician\TechnicianRepository;
use App\Http\Requests\Backend\Inventory\Technician\ManageTechnicianRequest;
use App\Http\Requests\Backend\Inventory\Technician\StoreTechnicianRequest;
use App\Http\Requests\Backend\Inventory\Technician\UpdateTechnicianRequest;

class TechnicianController extends Controller
{
   protected $technicians;

   public function __construct(TechnicianRepository $technicians)
   {
      $this->technicians = $technicians;
   }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageTechnicianRequest $request)
   {
      return view('backend.inventory.technician.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('backend.inventory.technician.create');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreTechnicianRequest $request)
   {
      $this->technicians->create([
         'data' => $request->only(
            'name',
            'email',
            'address',
            'contact_number',
            'email'
         )
      ]);

      return redirect()->route('admin.inventory.technician.index')->withFlashSuccess(trans('alerts.backend.inventory.technicians.created'));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Technician $technician, ManageTechnicianRequest $request)
   {
      return view('backend.inventory.technician.show')->withTechnician($technician);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit(Technician $technician, ManageTechnicianRequest $request)
   {
      return view('backend.inventory.technician.edit')->withTechnician($technician);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Technician $technician, UpdateTechnicianRequest $request)
   {
      $this->technicians->update($technician,
      [
         'data' => $request->only(
            'name',
            'email',
            'address',
            'contact_number',
            'note',
            'status'
            )
         ]
      );

      return redirect()->back()->withFlashSuccess(trans('alerts.backend.inventory.technicians.updated'));
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
