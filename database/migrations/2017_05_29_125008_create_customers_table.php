<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('customers', function (Blueprint $table) {
         $table->increments('id');
         $table->string('company_name');
         $table->string('contact_number');
         $table->string('alternative_contact_number');
         $table->string('email')->unique();
         $table->string('note');
         $table->string('other_category');
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
      Schema::dropIfExists('customers');
   }
}
