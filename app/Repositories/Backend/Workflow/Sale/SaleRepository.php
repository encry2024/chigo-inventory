<?php

namespace App\Repositories\Backend\Workflow\Sale;

use App\Models\Workflow\Sale\Sale;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Workflow\Sale\SaleCreated;
use App\Events\Backend\Workflow\Sale\SaleDeleted;
use App\Events\Backend\Workflow\Sale\SaleUpdated;
use App\Events\Backend\Workflow\Sale\SaleRestored;
use App\Events\Backend\Workflow\Sale\SalePermanentlyDeleted;

/**
* Class SaleRepository.
*/
class SaleRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Sale::class;

   /**
   * @param        $permissions
   * @param string $by
   *
   * @return mixed
   */
   public function getForDataTable($status = 1, $trashed = false)
   {
      /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query()
      ->with(['users', 'customers'])
      ->select([
         config('inventory.sales_table').'.id',
         config('inventory.sales_table').'.reference_number',
         config('inventory.sales_table').'.customer_id',
         config('inventory.sales_table').'.user_id',
         config('inventory.sales_table').'.status',
         config('inventory.sales_table').'.created_at',
         config('inventory.sales_table').'.updated_at',
         config('inventory.sales_table').'.deleted_at',
      ]);

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      // active() is a scope on the UserScope trait
      return $dataTableQuery->active($status);
   }

   public function create($input)
   {
      $data = $input['data'];

      $sale = $this->createSaleStub($data);

      DB::transaction(function () use ($sale, $data) {
         if ($sale->save()) {
            event(new SaleCreated($sale));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.create_error'));
      });
   }

   protected function createSaleStub($input)
   {
      $sale = self::MODEL;
      $sale = new $sale;
      $sale->customer_id = $input['customer_id'];
      $sale->user_id = 0;
      $sale->reference_number = $input['reference_number'];
      $sale->manufacturer = $input['manufacturer'];
      $sale->price = $input['price'];
      $sale->status = isset($input['status']) ? 1 : 0;
      $sale->horsepower = $input['horsepower'];
      $sale->voltage = $input['voltage'];
      $sale->size = $input['size'];
      $sale->brand_name = $input['brand_name'];
      $sale->feature = $input['feature'];
      $sale->manufacturer = $input['manufacturer'];

      return $aircon;
   }

   public function delete(Model $aircon)
   {
      if ($aircon->delete()) {
         event(new AirconDeleted($aircon));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_error'));
   }

   public function forceDelete(Model $aircon)
   {
      if (is_null($aircon->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_first'));
      }

      DB::transaction(function () use ($aircon) {
         if ($aircon->forceDelete()) {
            event(new AirconPermanentlyDeleted($aircon));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_error'));
      });
   }

   public function restore(Model $aircon)
   {
      if (is_null($aircon->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.cant_restore'));
      }

      if ($aircon->restore()) {
         event(new AirconRestored($aircon));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.restore_error'));
   }
}
