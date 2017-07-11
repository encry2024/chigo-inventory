<?php

namespace App\Events\Backend\Inventory\Technician;

use Illuminate\Queue\SerializesModels;

/**
* Class TechnicianDeleted.
*/
class TechnicianDeleted
{
   use SerializesModels;

   /**
   * @var
   */
   public $technician;

   /**
   * @param $technician
   */
   public function __construct($technician)
   {
      $this->technician = $technician;
   }
}
