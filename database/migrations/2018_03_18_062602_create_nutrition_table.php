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
            $table->string('portion_size')->nullable();
            $table->string('gram_protein')->nullable();
            $table->string('gram_fat')->nullable();
            $table->string('gram_saturated_fat')->nullable();
            $table->string('cholesterol')->nullable();
            $table->string('sodium')->nullable();
            $table->string('carbohydrates')->nullable();
            $table->string('sugars')->nullable();
            $table->string('fiber')->nullable();
            $table->string('calories')->nullable();
            $table->string('start_date_time');
            $table->string('end_date_time')->nullable();
            $table->string('status')->default('active');
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
