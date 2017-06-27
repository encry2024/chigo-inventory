<?php

namespace App\Models\Inventory\Item\Category\Traits\Relationship;

/**
* Class UserRelationship.
*/
trait CategoryRelationship
{
   /**
   * One-to-One relations with Role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
   public function aircons()
   {
      return $this->hasMany(config('inventory.aircon'));
   }

}
