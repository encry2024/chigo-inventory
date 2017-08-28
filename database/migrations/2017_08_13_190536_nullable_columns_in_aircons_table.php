<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableColumnsInAirconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aircons', function (Blueprint $table) {
            $table->string('batch_code')->nullable()->change();
            $table->string('container_number')->nullable()->change();
            $table->string('door_type')->nullable()->change();
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
            //
        });
    }
}
