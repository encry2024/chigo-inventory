<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeBeforeServiceColumnInCustomerTypesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('customer_types', function (Blueprint $table) {
         $table->string('time_before_service');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('customer_types', function (Blueprint $table) {
         $table->dropColumn('time_before_service');
      });
   }
}
