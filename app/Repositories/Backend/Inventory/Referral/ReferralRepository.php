<?php

namespace App\Repositories\Backend\Inventory\Referral;

use App\Models\Inventory\Referral\Referral;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Inventory\Referral\ReferralCreated;
use App\Events\Backend\Inventory\Referral\ReferralDeleted;
use App\Events\Backend\Inventory\Referral\ReferralUpdated;
use App\Events\Backend\Inventory\Referral\ReferralUploaded;
use App\Events\Backend\Inventory\Referral\ReferralRestored;
use App\Events\Backend\Inventory\Referral\ReferralPermanentlyDeleted;

/**
* Class ReferralRepository.
*/
class ReferralRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Referral::class;

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
         config('inventory.referrals_table').'.id',
         config('inventory.referrals_table').'.name',
         config('inventory.referrals_table').'.address',
         config('inventory.referrals_table').'.notes',
         config('inventory.referrals_table').'.created_at',
         config('inventory.referrals_table').'.updated_at',
         config('inventory.referrals_table').'.deleted_at',
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

      $referral = $this->createReferralStub($data);

      DB::transaction(function () use ($referral, $data) {
         if ($referral->save()) {
            event(new ReferralCreated($referral));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.referral.create_error'));
      });
   }

   public function update(Model $referral, array $input)
   {
      $data = $input['data'];

      $referral->name = $data['name'];
      $referral->address = $data['address'];
      $referral->notes = $data['notes'];

      DB::transaction(function () use ($referral, $data) {
         if ($referral->save()) {
            event(new ReferralUpdated($referral));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.referral.update_error'));
      });
   }

   protected function createReferralStub($input)
   {
      $referral = self::MODEL;
      $referral = new $referral;
      $referral->name = $input['name'];
      $referral->address = $input['address'];
      $referral->notes = $input['notes'];

      return $referral;
   }

   public function delete(Model $referral)
   {
      if ($referral->delete()) {
         event(new ReferralDeleted($referral));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.referral.delete_error'));
   }

   public function forceDelete(Model $referral)
   {
      if (is_null($referral->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.referral.delete_first'));
      }

      DB::transaction(function () use ($referral) {
         if ($referral->forceDelete()) {
            event(new ReferralPermanentlyDeleted($referral));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.referral.delete_error'));
      });
   }

   public function restore(Model $referral)
   {
      if (is_null($referral->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.referral.cant_restore'));
      }

      if ($referral->restore()) {
         event(new ReferralRestored($referral));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.referral.restore_error'));
   }
}
