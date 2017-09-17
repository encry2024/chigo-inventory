<?php

namespace App\Repositories\Backend\Inventory\Peripheral;

use App\Models\Inventory\Item\Peripheral\Peripheral;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Inventory\Peripheral\PeripheralCreated;
use App\Events\Backend\Inventory\Peripheral\PeripheralDeleted;
use App\Events\Backend\Inventory\Peripheral\PeripheralUpdated;
use App\Events\Backend\Inventory\Peripheral\PeripheralRestored;
use App\Events\Backend\Inventory\Peripheral\PeripheralPermanentlyDeleted;

/**
* Class PeripheralRepository.
*/
class PeripheralRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Peripheral::class;

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
         config('inventory.peripherals_table').'.id',
         config('inventory.peripherals_table').'.description',
         config('inventory.peripherals_table').'.serial_number',
         config('inventory.peripherals_table').'.price',
         config('inventory.peripherals_table').'.quantity',
         config('inventory.peripherals_table').'.created_at',
         config('inventory.peripherals_table').'.updated_at',
         config('inventory.peripherals_table').'.deleted_at',
      ]);

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      // active() is a scope on the UserScope trait
      return $dataTableQuery;
   }

   public function create($input)
   {
      $data = $input['data'];

      $peripheral = $this->createPeripheralStub($data);

      DB::transaction(function () use ($peripheral, $data) {
         if ($peripheral->save()) {
            event(new PeripheralCreated($peripheral));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.create_error'));
      });
   }

   public function update(Model $peripheral, array $input)
   {
      $data = $input['data'];
      
      $peripheral->serial_number = $data['serial_number'];
      $peripheral->description = $data['description'];
      $peripheral->price = $data['price'];
      $peripheral->quantity = $data['quantity'];

      DB::transaction(function () use ($peripheral, $data) {
         if ($peripheral->save()) {
            event(new PeripheralUpdated($peripheral));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.update_error'));
      });
   }

   protected function createPeripheralStub($input)
   {
      $peripheral = self::MODEL;
      $peripheral = new $peripheral;
      $peripheral->serial_number = $input['serial_number'];
      $peripheral->description = $input['description'];
      $peripheral->price = $input['price'];
      $peripheral->quantity = $input['quantity'];

      return $peripheral;
   }

   public function delete(Model $peripheral)
   {
      if ($peripheral->delete()) {
         event(new PeripheralDeleted($peripheral));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.delete_error'));
   }

   public function forceDelete(Model $peripheral)
   {
      if (is_null($peripheral->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.delete_first'));
      }

      DB::transaction(function () use ($peripheral) {
         if ($peripheral->forceDelete()) {
            event(new PeripheralPermanentlyDeleted($peripheral));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.delete_error'));
      });
   }

   public function restore(Model $peripheral)
   {
      if (is_null($peripheral->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.cant_restore'));
      }

      if ($peripheral->restore()) {
         event(new PeripheralRestored($peripheral));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.items.peripherals.restore_error'));
   }
}
