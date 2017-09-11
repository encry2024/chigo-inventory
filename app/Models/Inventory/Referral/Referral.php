<?php

namespace App\Models\Inventory\Referral;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory\Referral\Traits\Attribute\ReferralAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
   //
   use ReferralAttribute,
   SoftDeletes;

   protected $table;

   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('inventory.referrals_table');
   }
}
