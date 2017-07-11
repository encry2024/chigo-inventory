<?php

namespace App\Models\Inventory\Technician;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory\Technician\Traits\Scope\TechnicianScope;
use App\Models\Inventory\Technician\Traits\Attribute\TechnicianAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technician extends Model
{
   //
   use TechnicianScope,
   SoftDeletes,
   TechnicianAttribute;


   /**
   * The database table used by the model.
   *
   * @var string
   */
   protected $table;

   //
   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('inventory.technician.technicians_table');
   }
}
