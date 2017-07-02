<?php

namespace App\Models\Workflow\Sale\Traits\Relationship;

/**
* Class SaleRelationship.
*/
trait SaleRelationship
{
   /**
   * One-to-Many relations with Users.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
   public function user()
   {
      return $this->belongsTo(config('workflow.user'));
   }

   public function customer()
   {
      return $this->belongsTo(config('workflow.customer'));
   }

}
