<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailAndStatusInTechniciansTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('technicians', function (Blueprint $table) {
         $table->string('email')->after('name');
         $table->string('status')->after('contact_number');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('technicians', function (Blueprint $table) {
         //
      });
   }
}
