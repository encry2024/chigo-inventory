<?php

namespace App\Models\Inventory\Customer\Traits\Relationship;

/**
* Class CustomerRelationship.
*/
trait CustomerRelationship
{
   /**
   * One-to-One relations with Role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
   public function aircons()
   {
      return $this->hasMany(config('inventory.category'));
   }

   public function peripherals()
   {
      return $this->hasMany(config('inventory.peripherals'));
   }

   public function customer_type()
   {
      return $this->belongsTo(config('inventory.customer_type'));
   }

}
