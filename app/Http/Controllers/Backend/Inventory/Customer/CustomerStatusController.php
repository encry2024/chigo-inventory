<?php

namespace App\Http\Controllers\Backend\Inventory\Customer;

use App\Models\Inventory\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Customer\CustomerRepository;
use App\Http\Requests\Backend\Inventory\Customer\ManageCustomerRequest;

/**
* Class CustomerStatusController.
*/
class CustomerStatusController extends Controller
{
   /**
   * @var CustomerRepository
   */
   protected $customers;

   /**
   * @param CustomerRepository $customers
   */
   public function __construct(CustomerRepository $customers)
   {
      $this->customers = $customers;
   }

   /**
   * @param ManageCustomerRequest $request
   *
   * @return mixed
   */
   public function getDeleted(ManageCustomerRequest $request)
   {
      return view('backend.inventory.customer.deleted');
   }

   /**
   * @param User              $deletedUser
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function delete(Customer $deleteCustomer, ManageCustomerRequest $request)
   {
      $this->customers->forceDelete($deleteCustomer);

      return redirect()->route('admin.inventory.customer.deleted')->withFlashSuccess(trans('alerts.backend.inventory.customers.deleted_permanently'));
   }

   /**
   * @param User              $deleteCustomer
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function restore(Customer $deleteCustomer, ManageCustomerRequest $request)
   {
      $this->customers->restore($deleteCustomer);

      return redirect()->route('admin.inventory.customer.index')->withFlashSuccess(trans('alerts.backend.inventory.customers.restored'));
   }
}
