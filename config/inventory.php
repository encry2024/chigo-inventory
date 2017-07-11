<?php

use App\Models\Inventory\Item\Aircon\Aircon;
use App\Models\Inventory\Item\Category\Category;
use App\Models\Inventory\Item\Peripherals\Peripheral;
use App\Models\Inventory\Customer\Customer;
use App\Models\Inventory\Technician\Technician;

return [
   'customers_table' => 'customers',

   'customer' => Customer::class,

   /*
   * Aircons table used to store aircons
   */
   'aircons_table' => 'aircons',

   'aircon' => Aircon::class,

   /*
   * Category table used by Backend User to save Categories to the database.
   */
   'categories_table' => 'categories',

   /*
   * Category model used by Inventory to create correct relations. Update the category if it is in a different namespace.
   */
   'category' => Category::class,

   /*
   * Peripherals model used by Aircon to create correct relations.
   * Update the permission if it is in a different namespace.
   */
   'peripherals_table' => 'peripherals',

   /*
   * Peripheral table.
   */
   'peripheral' => Peripheral::class,

   /*
   * aircon_category table used by Aircon to save relationship between aircon and category to the database.
   */
   'aircon_category_table' => 'aircon_category',

   /*
   * aircon_peripheral table used by Aircon to save assigned peripheral to the database.
   */
   'aircon_peripheral_table' => 'aircon_peripheral',

   'technician' => [
      'technician' => Technician::class,

      'technicians_table' => 'technicians',
   ]
];
