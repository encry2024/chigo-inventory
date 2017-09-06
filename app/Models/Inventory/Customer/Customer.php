<?php

namespace App\Models\Inventory\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory\Customer\Traits\Scope\CustomerScope;
use App\Models\Inventory\Customer\Traits\Attribute\CustomerAttribute;
use App\Models\Inventory\Customer\Traits\Relationship\CustomerRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
   use CustomerScope,
   SoftDeletes,
   CustomerAttribute,
   CustomerRelationship;

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
      $this->table = config('inventory.customers_table');
   }
}
