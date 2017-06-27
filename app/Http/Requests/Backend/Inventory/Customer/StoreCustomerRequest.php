<?php

namespace App\Http\Requests\Backend\Inventory\Customer;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends Request
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
         'company_name'   => ['required', 'max:191', Rule::unique('customers')],
         'contact_number' => ['required', 'max:11', 'min:10', Rule::unique('customers')],
         'note'           => 'max:50',
         'email'          => ['required', 'email', Rule::unique('customers')],
         'other_category' => 'max:50',
         'address'        => 'required',
      ];
   }
}
