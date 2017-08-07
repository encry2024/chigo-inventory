<?php

namespace App\Events\Backend\Inventory\Aircon;

use Illuminate\Queue\SerializesModels;

/**
* Class AirconUploaded.
*/
class AirconUploaded
{
   use SerializesModels;

   /**
   * @var
   */
   public $aircon;

   /**
   * @param $aircon
   */
   public function __construct($aircon)
   {
      $this->aircon = $aircon;
   }
}
