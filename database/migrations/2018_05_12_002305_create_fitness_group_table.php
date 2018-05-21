<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('img_src')->nullable();
            $table->string('img_alt')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('active');
            $table->string('visibility')->nullable();
            $table->timestamps();
        });

        /*
        $groups = array(
            'cardio_self_defense' => array(
                'type' => 'gym',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin elit dignissim massa tincidunt accumsan. Aliquam mollis ac ante vel dapibus. Ut eu libero porta dolor vestibulum pulvinar a ac lacus. Suspendisse convallis consequat dolor, at pharetra felis imperdiet vel. Mauris accumsan nisl eros, sit amet tristique dolor ullamcorper ultricies. Sed vitae aliquet enim. Donec nec sapien neque. Nulla nec commodo elit, et sollicitudin nunc. Donec iaculis felis sed augue maximus malesuada. Etiam non congue ex, molestie auctor purus. Donec ultricies ultricies lectus, vel ullamcorper nunc aliquam eu.',
                'img' => array(
                    'src' => 'images/fitness_groups/logos/cardio-self-defense.png',
                    'alt' => 'cardio self defense logo')
            ),
            'rock_fitness' => array(
                'type' => 'gym',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin elit dignissim massa tincidunt accumsan. Aliquam mollis ac ante vel dapibus. Ut eu libero porta dolor vestibulum pulvinar a ac lacus. Suspendisse convallis consequat dolor, at pharetra felis imperdiet vel. Mauris accumsan nisl eros, sit amet tristique dolor ullamcorper ultricies. Sed vitae aliquet enim. Donec nec sapien neque. Nulla nec commodo elit, et sollicitudin nunc. Donec iaculis felis sed augue maximus malesuada. Etiam non congue ex, molestie auctor purus. Donec ultricies ultricies lectus, vel ullamcorper nunc aliquam eu.',
                'img' => array(
                    'src' => 'images/fitness_groups/logos/rockfitness.jpg',
                    'alt' => 'rock fitness logo')
            ),
            'united_f_c' => array(
                'type' => 'gym',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin elit dignissim massa tincidunt accumsan. Aliquam mollis ac ante vel dapibus. Ut eu libero porta dolor vestibulum pulvinar a ac lacus. Suspendisse convallis consequat dolor, at pharetra felis imperdiet vel. Mauris accumsan nisl eros, sit amet tristique dolor ullamcorper ultricies. Sed vitae aliquet enim. Donec nec sapien neque. Nulla nec commodo elit, et sollicitudin nunc. Donec iaculis felis sed augue maximus malesuada. Etiam non congue ex, molestie auctor purus. Donec ultricies ultricies lectus, vel ullamcorper nunc aliquam eu.',
                'img' => array(
                    'src' => 'images/fitness_groups/logos/unitedfc.jpg',
                    'alt' => 'united f c logo')
            )
        );

        $types = array('gym', 'event', 'custom', 'special');
        $visibility = array('public', 'private', 'special');

        foreach ($groups as $key => $value) {
            DB::table('fitness_group')->insert([
                'name' => $key,
                'type' => $value['type'],
                'description' => $value['description'],
                'img_src' => $value['img']['src'],
                'img_alt' => $value['img']['alt'],
                'visibility' => 'public',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fitness_group');
    }
}
