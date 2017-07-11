<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnicalsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('technicals', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('technician_id')->unsigned();
         $table->integer('user_id')->unsigned();
         $table->integer('customer_id')->unsigned();
         $table->date('date_schedule');
         $table->string('time_schedule');
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
      Schema::dropIfExists('technicals');
   }
}
