<?php

namespace App\Models\Workflow\Sale\PeripheralSale;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workflow\Sale\PeripheralSale\Traits\Relationship\PeripheralSaleRelationship;

class PeripheralSale extends Model
{
   //
   //
   use PeripheralSaleRelationship;

   protected $table;
}
