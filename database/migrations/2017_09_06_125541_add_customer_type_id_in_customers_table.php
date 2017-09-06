<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerTypeIdInCustomersTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('customers', function (Blueprint $table) {
         $table->integer('customer_type_id')->after('id');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('customers', function (Blueprint $table) {
         $table->dropColumn('customer_type_id');
      });
   }
}
