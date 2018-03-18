<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('portion_size');
            $table->string('gram_protein');
            $table->string('gram_fat');
            $table->string('gram_saturated_fat');
            $table->string('cholesterol');
            $table->string('sodium');
            $table->string('carbohydrates');
            $table->string('sugars');
            $table->string('fiber');
            $table->string('calories');
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
        Schema::dropIfExists('nutrition');
    }
}
