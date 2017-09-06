<?php

namespace App\Repositories\Backend\Inventory\Customer;

use App\Models\Inventory\Customer\Customer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Inventory\Customer\CustomerCreated;
use App\Events\Backend\Inventory\Customer\CustomerDeleted;
use App\Events\Backend\Inventory\Customer\CustomerUpdated;
use App\Events\Backend\Inventory\Customer\CustomerRestored;
use App\Events\Backend\Inventory\Customer\CustomerPermanentlyDeleted;

/**
* Class CustomerRepository.
*/
class CustomerRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Customer::class;

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
         config('inventory.customers_table').'.id',
         config('inventory.customers_table').'.company_name',
         config('inventory.customers_table').'.contact_number',
         config('inventory.customers_table').'.email',
         config('inventory.customers_table').'.note',
         config('inventory.customers_table').'.other_category',
         config('inventory.customers_table').'.address',
         config('inventory.customers_table').'.created_at',
         config('inventory.customers_table').'.updated_at',
         config('inventory.customers_table').'.deleted_at',
      ]);

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      return $dataTableQuery;
   }

   public function create($input)
   {
      $data = $input['data'];

      $customer = $this->createCustomerStub($data);

      DB::transaction(function () use ($customer, $data) {
         if ($customer->save()) {
            event(new CustomerCreated($customer));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.customers.create_error'));
      });
   }

   public function update(Model $customer, array $input)
   {
      $data = $input['data'];

      $customer->company_name = $data['company_name'];
      $customer->contact_number = $data['contact_number'];
      $customer->address = $data['address'];
      $customer->email = $data['email'];
      $customer->note = $data['note'];
      $customer->other_category = $data['other_category'];
      $customer->customer_type_id = $data['customer_type'];

      DB::transaction(function () use ($customer, $data) {
         if ($customer->save()) {
            event(new CustomerUpdated($customer));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.customers.update_error'));
      });
   }

   protected function createCustomerStub($input)
   {
      $customer = self::MODEL;
      $customer = new $customer;
      $customer->company_name = $input['company_name'];
      $customer->contact_number = $input['contact_number'];
      $customer->email = $input['email'];
      $customer->other_category = $input['other_category'];
      $customer->note = $input['note'];
      $customer->customer_type_id = $input['customer_type'];
      $customer->address = $input['address'];

      return $customer;
   }

   public function delete(Model $customer)
   {
      if ($customer->delete()) {
         event(new CustomerDeleted($customer));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.customer.delete_error'));
   }

   public function forceDelete(Model $customer)
   {
      if (is_null($customer->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.customers.delete_first'));
      }

      DB::transaction(function () use ($customer) {
         if ($customer->forceDelete()) {
            event(new CustomerPermanentlyDeleted($customer));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.inventory.customers.delete_error'));
      });
   }

   public function restore(Model $customer)
   {
      if (is_null($customer->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.inventory.customers.cant_restore'));
      }

      if ($customer->restore()) {
         event(new CustomerRestored($customer));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.inventory.customers.restore_error'));
   }
}
