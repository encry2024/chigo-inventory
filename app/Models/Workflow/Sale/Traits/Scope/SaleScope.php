<?php

namespace App\Models\Workflow\Sale\Traits\Scope;
/**
* Class SaleScope.
*/
trait SaleScope
{
   /**
   * @param $query
   * @param bool $status
   *
   * @return mixed
   */
   public function scopeActive($query, $status = true)
   {
      return $query->where('status', $status);
   }
}
