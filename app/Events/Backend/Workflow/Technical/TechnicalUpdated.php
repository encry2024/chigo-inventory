<?php

namespace App\Events\Backend\Workflow\Technical;

use Illuminate\Queue\SerializesModels;

/**
* Class TechnicalUpdated.
*/
class TechnicalUpdated
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
