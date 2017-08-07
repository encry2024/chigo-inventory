<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInAirconsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('aircons', function (Blueprint $table) {
         $table->string('container_number')->nullable();
         $table->string('batch_code')->unique();
         $table->string('door_type');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('aircons', function (Blueprint $table) {
         //
      });
   }
}
