<?php

namespace App\Repositories\Backend\Inventory\Technician;

use App\Models\Inventory\Technician\Technician;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Inventory\Technician\TechnicianCreated;
use App\Events\Backend\Inventory\Technician\TechnicianDeleted;
use App\Events\Backend\Inventory\Technician\TechnicianUpdated;
use App\Events\Backend\Inventory\Technician\TechnicianRestored;
use App\Events\Backend\Inventory\Technician\TechnicianPermanentlyDeleted;

/**
* Class TechnicianRepository.
*/
class TechnicianRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Technician::class;

   /**
   * @param        $permissions
   * @param string $by
   *
   * @return mixed
   */
   public function getForDataTable($trashed = false)
   {
      /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query()
      ->select([
         config('inventory.technician.technicians_table').'.id',
         config('inventory.technician.technicians_table').'.name',
         config('inventory.technician.technicians_table').'.email',
         config('inventory.technician.technicians_table').'.contact_number',
         config('inventory.technician.technicians_table').'.note',
         config('inventory.technician.technicians_table').'.status',
         config('inventory.technician.technicians_table').'.address',
         config('inventory.technician.technicians_table').'.created_at',
         config('inventory.technician.technicians_table').'.updated_at',
         config('inventory.technician.technicians_table').'.deleted_at',
      ]);

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      return $dataTableQuery;
   }

   public function create($input)
   {
      $data = $input['data'];

      $technician = $this->createTechnicianStub($data);

      DB::transaction(function () use ($technician, $data) {
         if ($technician->save()) {
            event(new TechnicianCreated($technician));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.technicians.create_error'));
      });
   }

   public function update(Model $technician, array $input)
   {
      $data = $input['data'];

      $technician->name = $data['name'];
      $technician->email = $data['email'];
      $technician->address = $data['address'];
      $technician->contact_number = $data['contact_number'];
      $technician->note = $data['note'];
      $technician->status = $data['status'];

      DB::transaction(function () use ($technician, $data) {
         if ($technician->save()) {
            event(new TechnicianUpdated($technician));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.technicians.update_error'));
      });
   }

   protected function createTechnicianStub($input)
   {
      $technician = self::MODEL;
      $technician = new $technician;
      $technician->name = $input['name'];
      $technician->contact_number = $input['contact_number'];
      $technician->email = $input['email'];
      $technician->address = $input['address'];
      $technician->status = 'Available';

      return $technician;
   }

   public function delete(Model $technician)
   {
      if ($technician->delete()) {
         event(new TechnicianDeleted($technician));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.technician.delete_error'));
   }

   public function forceDelete(Model $technician)
   {
      if (is_null($technician->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.technicians.delete_first'));
      }

      DB::transaction(function () use ($technician) {
         if ($technician->forceDelete()) {
            event(new TechnicianPermanentlyDeleted($technician));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.technicians.delete_error'));
      });
   }

   public function restore(Model $technician)
   {
      if (is_null($technician->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.technicians.cant_restore'));
      }

      if ($technician->restore()) {
         event(new TechnicianRestored($technician));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.technicians.restore_error'));
   }
}
