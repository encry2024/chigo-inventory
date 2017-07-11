<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirconSalesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('aircon_sales', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('aircon_id')->unsigned();
         $table->integer('sale_id')->unsigned();
         $table->timestamps();
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('aircon_sales');
   }
}
