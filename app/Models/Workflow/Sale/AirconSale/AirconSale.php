<?php

namespace App\Models\Workflow\Sale\AirconSale;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workflow\Sale\AirconSale\Traits\Relationship\AirconSaleRelationship;

class AirconSale extends Model
{
   //
   use AirconSaleRelationship;

   protected $table;
}
