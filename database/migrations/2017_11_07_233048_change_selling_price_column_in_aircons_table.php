<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSellingPriceColumnInAirconsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('aircons', function (Blueprint $table) {
         $table->decimal('selling_price', 7,2)->change();
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
         $table->dropColumn('selling_price');
      });
   }
}
