<?php

namespace App\Http\Requests\Backend\Inventory\Referral;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UpdateReferralRequest extends Request
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
         'name'     => ['required', 'max:191'],
         'address'  => ['required', 'max:191'],
         'notes'    => ['max:100']
      ];
   }
}
