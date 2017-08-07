<?php

namespace App\Http\Requests\Backend\Inventory\Aircon;

use Illuminate\Foundation\Http\FormRequest;

class ImportAirconExcelRequest extends FormRequest
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
         'aircon_file' => ['mimes:xlsx,xls']
      ];
   }
}
