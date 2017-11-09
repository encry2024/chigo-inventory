<?php

namespace App\Models\Inventory\Referral\Trais\Relationship;

/**
* Class ReferralRelationship.
*/
trait ReferralRelationship
{
   /**
   * One-to-One relations with Role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
   public function referral_reports()
   {
      return $this->hasMany(config('inventory.aircon'));
   }

}
