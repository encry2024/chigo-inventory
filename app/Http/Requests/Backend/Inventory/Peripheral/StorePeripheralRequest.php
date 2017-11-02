<?php

namespace App\Http\Requests\Backend\Inventory\Peripheral;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StorePeripheralRequest extends Request
{
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
   public function authorize()
   {
      return access()->hasPermissions(['view-backend', 'view-inventory', 'manage-inventory'], true);
   }

   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'serial_number'  => ['required', 'max:191', Rule::unique('peripherals')],
         'description'    => ['max:191'],
         'price'          => ['required'],
         'quantity'       => ['max:191']
      ];
   }
}
