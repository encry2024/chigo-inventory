<?php

use App\Models\Workflow\Sale\Sale;
use App\Models\Inventory\Customer\Customer;
use App\Models\Inventory\Item\Aircon\Aircon;
use App\Models\Workflow\Technical\Technical;
use App\Models\Inventory\Technician\Technician;
use App\Models\Workflow\Sale\AirconSale\AirconSale;
use App\Models\Workflow\Technical\AirconTechnical;

return [
   'sale_config' => [
      /*
      * Workflow Sales table used to store Sales
      */
      'sale' => Sale::class,


      'sales_table' => 'sales',

      /*
      *  Workflow Customers table
      */
      'customer' => Customer::class,

      /*
      * Workflow Sales table used to make Relationship with Customers
      */
      'customer_table' => 'customer',

      /*
      * Workflow Sales table used to make Relationship with Users
      */
      'user_table' => 'user',

      /*
      *  Workflow Aircons table
      */
      'aircon' => Aircon::class,

      /*
      * Workflow Sales table used to make Relationship with Aircons
      */
      'aircons_table' => 'aircons',

      'aircon_sales' => AirconSale::class,
      'aircon_sales_table' => 'aircon_sales'
   ],

   'aircon_sale_config' => [
      'aircon' => Aircon::class,
      'aircons_table' => 'aircons'
   ],

   'technical_config' => [
      'technical' => Technical::class,

      'technicals_table' => 'technicals',

      /*
      *  AirconTechnical Relationship Table
      */

      'aircon_technicals' => AirconTechnical::class,

      'aircon_technicals_table' => 'aircon_technicals',

      /*
      *  Workflow Customers table
      */
      'customer' => Customer::class,

      /*
      * Workflow Technicals table used to make Relationship with Customers
      */
      'customer_table' => 'customer',

      /*
      * Workflow Technicals table used to make Relationship with Users
      */
      'user_table' => 'user',

      /*
      *  Workflow Customers table
      */
      'customer' => Customer::class,

      /*
      * Workflow Technical table used to make Relationship with Technician
      */
      'technician' => Technician::class,

      /*
      * Workflow Technical table used to make Relationship with Technician
      */
      'technicians_table' => 'technicians',
   ]
];
