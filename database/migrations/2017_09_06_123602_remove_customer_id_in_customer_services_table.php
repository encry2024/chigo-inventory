<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCustomerIdInCustomerServicesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('customer_services', function (Blueprint $table) {
         $table->dropColumn('customer_id');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('customer_services', function (Blueprint $table) {
         //
      });
   }
}
