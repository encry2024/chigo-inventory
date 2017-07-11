<?php

namespace App\Http\Requests\Backend\Inventory\Technician;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UpdateTechnicianRequest extends Request
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
         'name'            => ['required', 'max:191'],
         'contact_number'  => ['required', 'max:191', 'unique:technicians,contact_number,' . Request::get('technician_id')],
         'email'           => ['required', 'max:191', 'unique:technicians,email,' . Request::get('technician_id')],
         'address'         => ['required', 'max:191'],
      ];
   }
}
