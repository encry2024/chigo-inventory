<?php

namespace App\Events\Backend\Inventory\Referral;

use Illuminate\Queue\SerializesModels;

/**
* Class ReferralRestored.
*/
class ReferralRestored
{
   use SerializesModels;

   /**
   * @var
   */
   public $referral;

   /**
   * @param $referral
   */
   public function __construct($referral)
   {
      $this->referral = $referral;
   }
}
