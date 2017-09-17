<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInPeripheralsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('peripherals', function (Blueprint $table) {
         $table->string('description');
         $table->string('serial_number')->unique();
         $table->integer('quantity');
         $table->string('price');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('peripherals', function (Blueprint $table) {
         $table->dropColumn('description');
         $table->dropColumn('serial_number')->unique();
         $table->dropColumn('quantity');
         $table->dropColumn('price');
      });
   }
}
