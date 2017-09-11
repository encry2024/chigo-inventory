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
      return access()->allow('view-backend');
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
         'contact_number'  => ['required', 'max:191', 'unique:customers,contact_number,' . Request::get('customer_id')],
         'address'         => ['required', 'max:191'],
         'email'           => ['required', 'unique:customers,email,' . Request::get('customer_id')],
         'note'            => ['max:255'],
         'other_category'  => ['max:50'],
         'customer_type_id'=> ['required']
      ];
   }
}
