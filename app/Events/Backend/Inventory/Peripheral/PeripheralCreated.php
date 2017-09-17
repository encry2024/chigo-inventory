<?php

namespace App\Events\Backend\Inventory\Peripheral;

use Illuminate\Queue\SerializesModels;

/**
* Class PeripheralCreated.
*/
class PeripheralCreated
{
   use SerializesModels;

   /**
   * @var
   */
   public $peripheral;

   /**
   * @param $peripheral
   */
   public function __construct($peripheral)
   {
      $this->peripheral = $peripheral;
   }
}
