<?php

namespace App\Models\Workflow\Technical;

use Illuminate\Database\Eloquent\Model;

class AirconTechnical extends Model
{
   //
   protected $table;

   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('workflow.technical_config.aircon_technicals_table');
   }
}
