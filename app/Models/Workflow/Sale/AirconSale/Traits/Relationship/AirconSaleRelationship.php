<?php

namespace App\Models\Workflow\Sale\AirconSale\Traits\Relationship;

/**
* Class SaleRelationship.
*/
trait AirconSaleRelationship
{
   public function aircon()
   {
      return $this->belongsTo(config('workflow.sale_config.aircon'));
   }
}
