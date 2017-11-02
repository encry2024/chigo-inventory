<?php

namespace App\Http\Requests\Backend\Inventory\Aircon;

use Illuminate\Foundation\Http\FormRequest;

class LogPendingAirconRequest extends FormRequest
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
         'serial_number' => ['required']
      ];
   }
}
