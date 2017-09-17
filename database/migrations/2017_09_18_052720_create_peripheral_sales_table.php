<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeripheralSalesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('peripheral_sales', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('sale_id')->unsigned()->nullable();
         $table->integer('peripheral_id')->unsigned()->nullable();
         $table->string('quantity')->nullable();
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
      Schema::dropIfExists('peripheral_sales');
   }
}
