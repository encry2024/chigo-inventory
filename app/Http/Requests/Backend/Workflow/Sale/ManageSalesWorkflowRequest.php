<?php

namespace App\Http\Requests\Backend\Workflow\Sale;

use App\Http\Requests\Request;

class ManageSalesWorkflowRequest extends Request
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
         //
      ];
   }
}
