<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('company_name')->nullable();
            $table->string('subscription')->nullable();
            $table->integer('frequency')->nullable();
            $table->double('pricing')->nullable();
            $table->string('banner_src')->nullable();
            $table->string('banner_alt')->nullable();
            $table->string('message')->nullable();
            $table->string('link')->nullable();
            $table->string('ad_type');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('advertisement');
    }
}
