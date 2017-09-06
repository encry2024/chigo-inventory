<?php

namespace App\Models\Workflow\Technical;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workflow\Technical\Traits\Relationship\AirconTechnicalRelationship;


class AirconTechnical extends Model
{
   use AirconTechnicalRelationship;
   //
   protected $table;

   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('workflow.technical_config.aircon_technicals_table');
   }
}
