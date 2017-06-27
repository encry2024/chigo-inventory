<?php

namespace App\Models\Inventory\Item\Aircon\Traits\Scope;
/**
* Class AirconScope.
*/
trait AirconScope
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
