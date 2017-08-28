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
         $table->string('container_number')->after('status')->nullable();
         $table->string('batch_code')->after('container_number')->unique();
         $table->string('door_type')->after('batch_code');
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
         $table->dropColumn('container_number');
         $table->dropColumn('batch_code');
         $table->dropColumn('door_type');
      });
   }
}
