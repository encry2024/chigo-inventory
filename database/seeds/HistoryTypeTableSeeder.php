<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
* Class HistoryTypeTableSeeder.
*/
class HistoryTypeTableSeeder extends Seeder
{
   use DisableForeignKeys, TruncateTable;

   /**
   * Run the database seed.
   *
   * @return void
   */
   public function run()
   {
      $this->disableForeignKeys();
      $this->truncateMultiple(['history_types', 'history']);

      $types = [
         [
            'id'         => 1,
            'name'       => 'User',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ],
         [
            'id'         => 2,
            'name'       => 'Role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ],
         [
            'id'         => 3,
            'name'       => 'Aircon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 4,
            'name'       => 'Customer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 5,
            'name'       => 'Sale',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 6,
            'name'       => 'Technical',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 7,
            'name'       => 'Cleaning',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 8,
            'name'       => 'Technician',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 9,
            'name'       => 'Referral',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ],
         [
            'id'         => 10,
            'name'       => 'Peripheral',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]
      ];

      DB::table('history_types')->insert($types);

      $this->enableForeignKeys();
   }
}
