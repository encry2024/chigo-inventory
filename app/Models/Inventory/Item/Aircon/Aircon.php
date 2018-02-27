<?php

namespace App\Models\Inventory\Item\Aircon;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory\Item\Aircon\Traits\Scope\AirconScope;
use App\Models\Inventory\Item\Aircon\Traits\Attribute\AirconAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aircon extends Model
{

   use AirconScope,
   SoftDeletes,
   AirconAttribute;

   protected $fillable = ['name', 'serial_number', 'philippines_serial_number', 'manufacturer', 'size', 'voltage', 'horsepower',
   'price', 'selling_price', 'status', 'feature', 'brand_name', 'container_number', 'batch_code', 'door_type'];

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
      $this->table = config('inventory.aircons_table');
   }
}
