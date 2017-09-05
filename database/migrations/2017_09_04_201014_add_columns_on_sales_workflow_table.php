<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnSalesWorkflowTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('sales', function (Blueprint $table) {
         $table->string('terms')->after('reference_number');
         $table->date('date_needed')->after('status');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('sales', function (Blueprint $table) {
         $table->dropColumn('terms');
         $table->dropColumn('date_needed');
      });
   }
}
