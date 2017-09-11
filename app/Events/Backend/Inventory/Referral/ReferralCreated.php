<?php

namespace App\Events\Backend\Inventory\Referral;

use Illuminate\Queue\SerializesModels;

/**
* Class ReferralCreated.
*/
class ReferralCreated
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
