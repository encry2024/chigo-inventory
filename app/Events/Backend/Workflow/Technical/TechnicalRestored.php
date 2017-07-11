<?php

namespace App\Events\Backend\Workflow\Technical;

use Illuminate\Queue\SerializesModels;

/**
* Class TechnicalRestored.
*/
class TechnicalRestored
{
   use SerializesModels;

   /**
   * @var
   */
   public $technical;

   /**
   * @param $technical
   */
   public function __construct($technical)
   {
      $this->technical = $technical;
   }
}
