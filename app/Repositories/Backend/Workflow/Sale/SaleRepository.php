<?php

namespace App\Repositories\Backend\Workflow\Sale;

use App\Models\Workflow\Sale\Sale;
use App\Models\Inventory\Item\Aircon\Aircon;
use App\Models\Inventory\Item\Peripheral\Peripheral;
use App\Models\Workflow\Sale\AirconSale\AirconSale;
use App\Models\Workflow\Sale\PeripheralSale\PeripheralSale;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Workflow\Sale\SaleCreated;
use App\Events\Backend\Workflow\Sale\SaleDeleted;
use App\Events\Backend\Workflow\Sale\SaleUpdated;
use App\Events\Backend\Workflow\Sale\SaleRestored;
use App\Events\Backend\Workflow\Sale\SalePermanentlyDeleted;
use App\Repositories\Backend\Access\User\UserRepository;

/**
* Class SaleRepository.
*/
class SaleRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Sale::class;

   protected $user;

   /**
   * @param RoleRepository $user
   */
   public function __construct(UserRepository $user)
   {
      $this->user = $user;
   }

   function getReferenceNumber($lenght = 8) {
      // uniqid gives 13 chars, but you could adjust it to your needs.
      if (function_exists("random_bytes")) {
         $bytes = random_bytes(ceil($lenght / 2));
      } elseif (function_exists("openssl_random_pseudo_bytes")) {
         $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
      } else {
         throw new Exception("no cryptographically secure random function available");
      }
      return strtoupper(substr(bin2hex($bytes), 0, $lenght));
   }

   /**
   * @param        $permissions
   * @param string $by
   *
   * @return mixed
   */
   public function getForDataTable($status = 'Processed', $trashed = false)
   {
      /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query()
      ->with(['user', 'customer'])
      ->select([
         config('workflow.sale_config.sales_table').'.id',
         config('workflow.sale_config.sales_table').'.reference_number',
         config('workflow.sale_config.sales_table').'.customer_id',
         config('workflow.sale_config.sales_table').'.user_id',
         config('workflow.sale_config.sales_table').'.status',
         config('workflow.sale_config.sales_table').'.note',
         config('workflow.sale_config.sales_table').'.created_at',
         config('workflow.sale_config.sales_table').'.updated_at',
         config('workflow.sale_config.sales_table').'.deleted_at',
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

      $sale = $this->createSaleStub($data);

      DB::transaction(function () use ($sale, $data) {
         if ($sale->save()) {
            if(count($data['aircon']) != 0) {
               $sale->aircon = 1;
               $sale->save();

               foreach((array) $data['aircon'] as $aircon ) {
                  $aircon_sale = new AirconSale();
                  $aircon_sale->aircon_id = $aircon;
                  $aircon_sale->sale_id   = $sale->id;

                  if($aircon_sale->save()) {
                     $aircon = Aircon::find($aircon_sale->aircon_id);
                     $aircon->customer_id = $data['customer'];
                     $aircon->save();
                  }
               }
            }

            if(count($data['getPeripherals']) != 0) {
               $sale->parts = 1;
               $sale->save();

               foreach($data['getPeripherals'] as $peripheral) {
                  $getValue = explode('-', $peripheral);

                  $peripheral_sale = new PeripheralSale();
                  $peripheral_sale->sale_id = $sale->id;
                  $peripheral_sale->peripheral_id = $getValue[0];
                  $peripheral_sale->quantity = $getValue[1];

                  if($peripheral_sale->save()) {
                     $peripheral = Peripheral::find($peripheral_sale->peripheral_id);
                     $peripheral->quantity = $peripheral->quantity - $getValue[1];
                     $peripheral->save();
                  }
               }
            }

            event(new SaleCreated($sale));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.workflow.sales.create_error'));
      });
   }

   protected function createSaleStub($input)
   {
      $sale = self::MODEL;
      $sale = new $sale;
      $sale->customer_id = $input['customer'];
      $sale->user_id = $input['user_id'];
      $sale->reference_number = $this->getReferenceNumber();
      $sale->status = 0;
      $sale->note = $input['note'];
      $sale->date_needed = $input['date_needed'];
      $sale->terms = $input['terms'];

      return $sale;
   }

   public function delete(Model $sale)
   {
      if ($sale->delete()) {
         event(new SaleDeleted($sale));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.workflows.sales.delete_error'));
   }

   public function forceDelete(Model $sale)
   {
      if (is_null($sale->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.workflows.sales.delete_first'));
      }

      DB::transaction(function () use ($sale) {
         if ($sale->forceDelete()) {
            event(new SalePermanentlyDeleted($sale));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.workflows.sales.delete_error'));
      });
   }

   public function restore(Model $sale)
   {
      if (is_null($sale->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.workflows.sales.cant_restore'));
      }

      if ($sale->restore()) {
         event(new SaleRestored($sale));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.workflows.sales.restore_error'));
   }
}
