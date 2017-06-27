<?php

namespace App\Models\Inventory\Item\Aircon\Traits;

/**
* Class RoleAccess.
*/
trait AirconCategory
{
   /**
   * Attach permission to current role.
   *
   * @param object|array $permission
   *
   * @return void
   */
   public function associateToCategory($category)
   {
      if (is_object($category)) {
         $category = $category->getKey();
      }

      if (is_array($category)) {
         $category = $category['id'];
      }

      $this->categories()->attach($category);
   }

   /**
   * Detach permission form current role.
   *
   * @param object|array $permission
   *
   * @return void
   */
   public function deassociateToCategory($category)
   {
      if (is_object($category)) {
         $category = $category->getKey();
      }

      if (is_array($category)) {
         $category = $category['id'];
      }

      $this->category()->detach($category);
   }
}
