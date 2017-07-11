<?php

namespace App\Models\Workflow\Technical\Traits\Scope;
/**
* Class TechnicalScope.
*/
trait TechnicalScope
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
