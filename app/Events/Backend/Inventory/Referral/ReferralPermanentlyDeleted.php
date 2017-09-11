<?php

namespace App\Events\Backend\Inventory\Referral;

use Illuminate\Queue\SerializesModels;

/**
* Class ReferralPermanentlyDeleted.
*/
class ReferralPermanentlyDeleted
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
