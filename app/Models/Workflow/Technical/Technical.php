<?php

namespace App\Models\Workflow\Technical;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workflow\Technical\Traits\Scope\TechnicalScope;
use App\Models\Workflow\Technical\Traits\Attribute\TechnicalAttribute;
use App\Models\Workflow\Technical\Traits\Relationship\TechnicalRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technical extends Model
{

   use TechnicalScope,
   SoftDeletes,
   TechnicalRelationship,
   TechnicalAttribute;

   //
   protected $table;

   //
   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('workflow.technical_config.technicals_table');
   }
}
