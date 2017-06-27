<?php

namespace App\Models\Inventory\Customer\Traits\Scope;
/**
* Class AirconScope.
*/
trait CustomerScope
{
   /**
   * @param $query
   * @param bool $status
   *
   * @return mixed
   */
   public function scopeActive($status = true)
   {
      return $query->where($status);
   }
}
