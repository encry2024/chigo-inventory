<?php

use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      DB::table('customer_types')->insert(
         array(
            array(
               'name'                  => 'Residential',
               'created_at'            => date("Y-m-d H:i:s"),
               'updated_at'            => date("Y-m-d H:i:s"),
               'time_before_service'   => "+3 months"
            ),

            array(
               'name'                  => 'Commercial',
               'created_at'            => date("Y-m-d H:i:s"),
               'updated_at'            => date("Y-m-d H:i:s"),
               'time_before_service'   => "+2 months"
            ),

            array(
               'name'                  => 'Business',
               'created_at'            => date("Y-m-d H:i:s"),
               'updated_at'            => date("Y-m-d H:i:s"),
               'time_before_service'   => "+1 months"
            ),
         )
      );
   }
}
