<?php

namespace App\Models\Workflow\Sale;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workflow\Sale\Traits\Scope\SaleScope;
use App\Models\Workflow\Sale\Traits\Attribute\SaleAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{

   use SaleScope,
   SoftDeletes,
   SaleAttribute;

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
      $this->table = config('inventory.sales_table');
   }
}
