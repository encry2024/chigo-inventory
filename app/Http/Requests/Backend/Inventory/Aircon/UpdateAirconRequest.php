<?php

namespace App\Http\Requests\Backend\Inventory\Aircon;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UpdateAirconRequest extends Request
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
         'name'           => ['required', 'max:191', 'unique:aircons,name,' . Request::get('aircon_id')],
         'serial_number'  => ['required', 'max:191', 'unique:aircons,serial_number,' . Request::get('aircon_id')],
      ];
   }
}
