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
            $table->string('avatar_path')->default('images/avatars/blank_avatar.png');
            $table->string('role')->default('member');
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        $users = array(
            [
                'first_name' => 'Web',
                'last_name' => 'Master',
                'email' => 'webmaster@thefittestwarrior.com',
                'password' => '$2y$10$J41pZd4VKFhfqgaVbpOE4eCmlCcOJ6z5SVPdoXm5P1161pjhegUr6'
            ]
        );

        foreach ($users as $user) {
            DB::table('user')->insert(['first_name' => $user['first_name'], 'last_name' => $user['last_name'] , 'email' => $user['email'], 'password' => $user['password'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        }

        DB::table('user')->where('email', 'webmaster@thefittestwarrior.com')->update(['role' => 'admin']);
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
