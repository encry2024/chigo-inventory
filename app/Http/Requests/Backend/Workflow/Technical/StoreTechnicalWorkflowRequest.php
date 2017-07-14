<?php

namespace App\Http\Requests\Backend\Workflow\Technical;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StoreTechnicalWorkflowRequest extends Request
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
         'customer'       => ['required'],
         'technician'     => ['required'],
         'note'           => ['max:191'],
         'status'         => ['max:191'],
      ];
   }
}
