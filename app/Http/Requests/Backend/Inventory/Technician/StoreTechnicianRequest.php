<?php

namespace App\Http\Requests\Backend\Inventory\Technician;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StoreTechnicianRequest extends Request
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
         'name'           => ['required', 'max:191', Rule::unique('technicians')],
         'contact_number' => ['required', 'max:11', 'min:10', Rule::unique('technicians')],
         'email'          => ['required', 'email', Rule::unique('technicians')],
         'address'        => 'max:100',
      ];
   }
}
