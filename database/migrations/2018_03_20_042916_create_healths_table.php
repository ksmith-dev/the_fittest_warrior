<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('ldl_cholesterol');
            $table->string('fat_percentage');
            $table->string('systolic_blood_pressure');
            $table->string('diastolic_blood_pressure');
            $table->string('hdl_cholesterol');
            $table->string('start_date_time');
            $table->string('end_date_time');
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
        Schema::dropIfExists('healths');
    }
}
