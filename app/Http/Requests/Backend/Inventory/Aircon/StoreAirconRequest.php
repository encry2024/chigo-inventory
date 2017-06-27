<?php

namespace App\Http\Requests\Backend\Inventory\Aircon;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StoreAirconRequest extends Request
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
         'name'           => ['required', 'max:191', Rule::unique('aircons')],
         'serial_number'  => ['required', 'max:191', Rule::unique('aircons')],
         'manufacturer'   => 'required',
         'voltage'        => 'required',
         'horsepower'     => 'required',
         'size'           => 'required',
         'feature'        => 'required',
      ];
   }
}
