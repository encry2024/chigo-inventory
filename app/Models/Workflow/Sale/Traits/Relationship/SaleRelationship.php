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
      return $this->belongsTo(config('auth.providers.users.model'));
   }

   public function customer()
   {
      return $this->belongsTo(config('workflow.sale_config.customer'));
   }

   public function aircons()
   {
      return $this->hasMany(config('workflow.sale_config.sales'));
   }

   public function aircon_sales()
   {
      return $this->hasMany(config('workflow.sale_config.aircon_sales'));
   }
}
