<?php

namespace App\Models\Inventory\Item\Peripheral;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory\Item\Peripheral\Traits\Attribute\PeripheralAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peripheral extends Model
{

   use SoftDeletes,
   PeripheralAttribute;

   protected $fillable = ['serial_number', 'description', 'price', 'quantity'];

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
      $this->table = config('inventory.peripherals_table');
   }
}
