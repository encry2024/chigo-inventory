<?php

namespace App\Models\Workflow\Technical\Traits\Relationship;

/**
* Class SaleRelationship.
*/
trait AirconTechnicalRelationship
{
   public function aircon()
   {
      return $this->belongsTo(config('workflow.technical_config.aircon'));
   }
}
