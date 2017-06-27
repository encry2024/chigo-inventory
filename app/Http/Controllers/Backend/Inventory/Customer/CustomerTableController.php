<?php

namespace App\Http\Controllers\Backend\Inventory\Customer;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Inventory\Customer\CustomerRepository;
use App\Http\Requests\Backend\Inventory\Customer\ManageCustomerRequest;

/**
* Class CustomerTableController.
*/
class CustomerTableController extends Controller
{
   /**
   * @var UserRepository
   */
   protected $customers;

   /**
   * @param UserRepository $users
   */
   public function __construct(CustomerRepository $customers)
   {
      $this->customers = $customers;
   }

   /**
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageCustomerRequest $request)
   {
      return Datatables::of(
         $this->customers->getForDataTable($request->get('trashed')))
         ->escapeColumns([])
         ->addColumn('actions', function ($user) {
            return $user->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
