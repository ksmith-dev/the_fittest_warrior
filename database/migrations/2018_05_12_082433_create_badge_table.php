<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->string('status');
            $table->string('img_alt');
            $table->string('img_src');
            $table->timestamps();
        });

        $names = array(
            'gold',
            'silver',
            'bronze'
        );

        $statuses = array(
            'active',
            'disabled',
            'expired'
        );

        $attributes = array(
            'orange' => array(
                'src' => 'images/icons/orange_badge.png',
                'alt' => 'orange badge image'
            ),
            'green' => array(
                'src' => 'images/icons/green_badge.png',
                'alt' => 'purple badge image'
            ),
            'blue' => array(
                'src' => 'images/icons/blue_badge.png',
                'alt' => 'blue badge image'
            ),
            'purple' => array(
                'src' => 'images/icons/purple_badge.png',
                'alt' => 'purple badge image'
            )
        );

        foreach ($attributes as $key => $value) {
            DB::table('badge')->insert(['name' => $names[rand(0,2)], 'user_id' => rand(1, 10), 'status' => $statuses[rand(0,2)], 'img_src' => $value['src'], 'img_alt' => $value['alt']]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badge');
    }
}
