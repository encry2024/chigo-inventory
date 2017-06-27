<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirconsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('aircons', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('user_id');
         $table->integer('category_id');
         $table->string('name')->unique();
         $table->string('serial_number')->unique();
         $table->string('manufacturer');
         $table->decimal('price', 2);
         $table->string('horsepower');
         $table->decimal('voltage', 2);
         $table->string('size');
         $table->string('brand_name');
         $table->string('feature');
         $table->string('status')->default(1);
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
      Schema::dropIfExists('aircons');
   }
}
