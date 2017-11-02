<?php

namespace App\Http\Requests\Backend\Inventory\Peripheral;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UpdatePeripheralRequest extends Request
{
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
   public function authorize()
   {
      return access()->hasPermissions(['view-backend', 'view-inventory', 'manageview-inventory'], true);
   }

   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'description'    => ['required', 'max:191'],
         'serial_number'  => ['required', 'max:191|unique:peripherals,serial_number,' . Request::get('peripheral_id')],
         'quantity'       => ['max:191'],
         'price'          => ['max:191']
      ];
   }
}
