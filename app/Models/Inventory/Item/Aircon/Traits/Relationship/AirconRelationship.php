<?php

namespace App\Models\Inventory\Item\Aircon\Traits\Relationship;

/**
* Class UserRelationship.
*/
trait AirconRelationship
{
   /**
   * One-to-One relations with Role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
   public function categories()
   {
      return $this->belongsTo(config('inventory.category'));
   }

}
