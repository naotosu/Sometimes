<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSometimesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sometimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('user_id');
            $table->String('medicine_name');
            $table->datetime('next_time');
            $table->Integer('interval_time');
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
        Schema::dropIfExists('sometimes_data');
    }
}
