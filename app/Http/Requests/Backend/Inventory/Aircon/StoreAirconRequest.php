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
         'name'           => ['required', 'max:191'],
         'serial_number'  => ['required', 'max:191', Rule::unique('aircons')],
         'manufacturer'   => ['max:30'],
         'voltage'        => ['max:30'],
         'horsepower'     => ['max:30'],
         'size'           => ['max:30'],
         'feature'        => ['max:191'],
      ];
   }
}
