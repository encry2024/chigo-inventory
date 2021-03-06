<?php

namespace App\Http\Requests\Backend\Workflow\Sale;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StoreSalesWorkflowRequest extends Request
{
   public function authorize()
   {
      return access()->hasPermissions(['view-backend', 'view-workflow', 'manage-workflow'], true);
   }

   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'customer'    => ['required'],
         'user_id'     => 'required',
         'note'        => 'max:191'
      ];
   }
}
