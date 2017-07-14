<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsInTechnicalsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('technicals', function (Blueprint $table) {
         $table->renameColumn('date_schedule','start_date_schedule');
         $table->renameColumn('time_schedule', 'start_time_schedule');

         $table->date('date_schedule')->change();
         $table->time('time_schedule')->change();

         $table->date('end_date_schedule')->after('time_schedule');
         $table->time('end_time_schedule')->after('end_date_schedule');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('technicals', function (Blueprint $table) {
         //
      });
   }
}
