<?php

namespace App\Events\Backend\Workflow\Sale;

use Illuminate\Queue\SerializesModels;

/**
* Class AirconCreated.
*/
class SaleUpdated
{
   use SerializesModels;

   /**
   * @var
   */
   public $sale;

   /**
   * @param $sale
   */
   public function __construct($sale)
   {
      $this->sale = $sale;
   }
}
