<?php

namespace App\Models\Inventory\Customer;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
   protected $table;

   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('inventory.customer_types_table');
   }
}
