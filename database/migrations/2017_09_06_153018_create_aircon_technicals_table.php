<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirconTechnicalsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('aircon_technicals', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('aircon_id')->unsigned();
         $table->integer('technical_id')->unsigned();
         $table->string('type');
         $table->string('note');
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
      Schema::dropIfExists('aircon_technicals');
   }
}
