<?php

namespace App\Models\Workflow\Technical\Traits\Relationship;

/**
* Class TechnicalRelationship.
*/
trait TechnicalRelationship
{
   /**
   * One-to-Many relations with Users.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
   public function user()
   {
      return $this->belongsTo(config('auth.providers.users.model'));
   }

   public function customer()
   {
      return $this->belongsTo(config('workflow.technical_config.customer'));
   }

   public function aircons()
   {
      return $this->hasMany(config('workflow.technical_config.sales'));
   }

   public function technicians()
   {
      return $this->hasMany(config('workflow.technical_config.technicians'));
   }
}
