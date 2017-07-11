<?php

namespace App\Repositories\Backend\Workflow\Technical;

use App\Models\Workflow\Technical\Technical;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Workflow\Technical\TechnicalCreated;
use App\Events\Backend\Workflow\Technical\TechnicalDeleted;
use App\Events\Backend\Workflow\Technical\TechnicalUpdated;
use App\Events\Backend\Workflow\Technical\TechnicalRestored;
use App\Events\Backend\Workflow\Technical\TechnicalPermanentlyDeleted;
use App\Repositories\Backend\Access\User\UserRepository;

/**
* Class SaleRepository.
*/
class TechnicalRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Technical::class;

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
   public function getForDataTable($trashed = false)
   {
      /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query()
      ->with(['user', 'customer'])
      ->select([
         config('workflow.technical_config.technicals_table').'.id',
         config('workflow.technical_config.technicals_table').'.reference_id',
         config('workflow.technical_config.technicals_table').'.customer_id',
         config('workflow.technical_config.technicals_table').'.user_id',
         config('workflow.technical_config.technicals_table').'.status',
         config('workflow.technical_config.technicals_table').'.note',
         config('workflow.technical_config.technicals_table').'.date_schedule',
         config('workflow.technical_config.technicals_table').'.time_schedule',
         config('workflow.technical_config.technicals_table').'.created_at',
         config('workflow.technical_config.technicals_table').'.updated_at',
         config('workflow.technical_config.technicals_table').'.deleted_at',
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

      $technical = $this->createTechnicalStub($data);

      DB::transaction(function () use ($technical, $data) {
         if ($technical->save()) {
            event(new TechnicalCreated($technical));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.workflow.technicals.create_error'));
      });
   }

   protected function createTechnicalStub($input)
   {
      $technical = self::MODEL;
      $technical = new $technical;
      $technical->customer_id = $input['customer'];
      $technical->user_id = $input['user_id'];
      $technical->reference_id = $this->getReferenceNumber();
      $technical->status = "Processing";
      $technical->note = $input['note'];
      $technical->date_schedule = $input['date_schedule'];
      $technical->time_schedule = $input['time_schedule'];

      return $technicals;
   }

   // public function delete(Model $aircon)
   // {
   //    if ($aircon->delete()) {
   //       event(new AirconDeleted($aircon));
   //
   //       return true;
   //    }
   //
   //    throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_error'));
   // }
   //
   // public function forceDelete(Model $aircon)
   // {
   //    if (is_null($aircon->deleted_at)) {
   //       throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_first'));
   //    }
   //
   //    DB::transaction(function () use ($aircon) {
   //       if ($aircon->forceDelete()) {
   //          event(new AirconPermanentlyDeleted($aircon));
   //
   //          return true;
   //       }
   //
   //       throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.delete_error'));
   //    });
   // }
   //
   // public function restore(Model $aircon)
   // {
   //    if (is_null($aircon->deleted_at)) {
   //       throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.cant_restore'));
   //    }
   //
   //    if ($aircon->restore()) {
   //       event(new AirconRestored($aircon));
   //
   //       return true;
   //    }
   //
   //    throw new GeneralException(trans('exceptions.backend.inventory.items.aircons.restore_error'));
   // }
}
