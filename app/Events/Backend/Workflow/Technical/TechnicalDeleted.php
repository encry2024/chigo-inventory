<?php

namespace App\Events\Backend\Workflow\Technical;

use Illuminate\Queue\SerializesModels;

/**
* Class TechnicalDeleted.
*/
class TechnicalDeleted
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
