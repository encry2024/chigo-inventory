<?php

namespace App\Models\Inventory\Technician\Traits\Scope;
/**
* Class TechnicianScope.
*/
trait TechnicianScope
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
