<?php

namespace App\Models\Inventory\Item\Peripheral\Traits\Relationship;

/**
* Class UserRelationship.
*/
trait PeripheralRelationship
{
   /**
   * One-to-One relations with Role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
   public function aircon()
   {
      return $this->belongsTo(config('inventory.aircon'));
   }

}
