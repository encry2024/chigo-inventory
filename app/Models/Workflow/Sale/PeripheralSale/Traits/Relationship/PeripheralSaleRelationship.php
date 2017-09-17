<?php

namespace App\Models\Workflow\Sale\PeripheralSale\Traits\Relationship;

/**
* Class PeripheralSaleRelationship.
*/
trait PeripheralSaleRelationship
{
   public function peripheral()
   {
      return $this->belongsTo(config('workflow.sale_config.peripheral'));
   }
}
