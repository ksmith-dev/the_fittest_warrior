<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('unit')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('b_m_i')->nullable();
            $table->string('role')->default('member');
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        $users = array(
            [
                'id' => '1',
                'first_name' => 'Jack',
                'last_name' => 'Black',
                'email' => 'black@domain.com',
                'password' => 'na'
            ],
            [
                'id' => '2',
                'first_name' => 'Jack',
                'last_name' => 'Sparrow',
                'email' => 'sparrow@domain.com',
                'password' => 'na'
            ],
            [
                'id' => '3',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'doe@domain.com',
                'password' => 'na'
            ],
            [
                'id' => '4',
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane@domain.com',
                'password' => 'na'
            ],
            [
                'id' => '5',
                'first_name' => 'Petter',
                'last_name' => 'Parker',
                'email' => 'parker@domain.com',
                'password' => 'na'
            ]
        );

        foreach ($users as $user) {
            DB::table('user')->insert(['id' => $user['id'], 'first_name' => $user['first_name'], 'last_name' => $user['last_name'] , 'email' => $user['email'], 'password' => $user['password'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
