<?php

namespace App\Http\Controllers\Backend\Inventory\Customer;

use App\Models\Inventory\Customer\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Inventory\Customer\CustomerRepository;
use App\Http\Requests\Backend\Inventory\Customer\ManageCustomerRequest;
use App\Http\Requests\Backend\Inventory\Customer\StoreCustomerRequest;
use App\Http\Requests\Backend\Inventory\Customer\UpdateCustomerRequest;
use App\Models\Inventory\Referral\Referral;

class CustomerController extends Controller
{
   protected $customers;

   public function __construct(CustomerRepository $customers)
   {
      $this->customers = $customers;
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageCustomerRequest $request)
   {
      return view('backend.inventory.customer.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $referrals = Referral::all();

      return view('backend.inventory.customer.create', compact('referrals'));
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreCustomerRequest $request)
   {
      $this->customers->create([
         'data' => $request->only(
            'company_name',
            'contact_number',
            'alternative_contact_number',
            'address',
            'note',
            'other_category',
            'email',
            'customer_type',
            'discount',
            'referral'
         )
      ]);

      return redirect()->route('admin.inventory.customer.index')->withFlashSuccess(trans('alerts.backend.inventory.customers.created'));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Customer $customer, ManageCustomerRequest $request)
   {
      return view('backend.inventory.customer.show')->withCustomer($customer);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit(Customer $customer, ManageCustomerRequest $request)
   {
      return view('backend.inventory.customer.edit')->withCustomer($customer);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Customer $customer, UpdateCustomerRequest $request)
   {
      $this->customers->update($customer,
      [
         'data' => $request->only(
            'company_name',
            'contact_number',
            'alternative_contact_number',
            'email',
            'note',
            'other_category',
            'address',
            'discount',
            'customer_type_id'
         )
      ]);

      return redirect()->route('admin.inventory.customer.index')->withFlashSuccess(trans('alerts.backend.inventory.customers.updated'));
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Customer $customer, ManageCustomerRequest $request)
   {
      $this->customers->delete($customer);

      return redirect()->route('admin.inventory.customer.deleted')->withFlashSuccess(trans('alerts.backend.inventory.customers.deleted'));
   }
}
