<?php

namespace App\Http\Requests\Backend\Inventory\Customer;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends Request
{
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
   public function authorize()
   {
      return access()->hasPermissions(['view-backend', 'view-customer', 'manage-customer'], true);
   }

   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'company_name'    => ['required', 'max:191', 'unique:customers,company_name,' . Request::get('customer_id')],
         'contact_number'  => ['required', 'max:11', 'min:10', 'unique:customers,contact_number,' . Request::get('customer_id')],
         'alternative_contact_number'  => ['required', 'max:9', 'min:7', 'unique:customers,alternative_contact_number,' . Request::get('customer_id')],
         'address'         => ['required', 'max:191'],
         'email'           => ['required', 'unique:customers,email,' . Request::get('customer_id')],
         'note'            => ['max:255'],
         'other_category'  => ['max:50'],
         'customer_type_id'=> ['required']
      ];
   }
}
