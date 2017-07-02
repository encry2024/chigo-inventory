<?php

use App\Models\Workflow\Sale\Sale;
use App\Models\Inventory\Customer\Customer;
use App\Models\Access\User\User;

return [
   /*
   * Workflow Sales table used to store Sales
   */

   'sales_table' => 'sales',

   'sale' => Sale::class,

   /*
   * Workflow Sales table used to make Relationship with Customers
   */

   'customers_table' => 'customers',

   'customer' => Customer::class,

   /*
   * Workflow Sales table used to make Relationship with Users
   */
   'users_table' => 'users',

   'user' => User::class,


];
