<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('sales', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('user_id')->unsigned();
         $table->integer('customer_id')->unsigned();
         $table->boolean('aircon')->default(0);
         $table->boolean('parts')->default(0);
         $table->string('status');
         $table->string('reference_number')->unique();
         $table->timestamps();
         $table->softDeletes();
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('sales');
   }
}
