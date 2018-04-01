<?php

namespace Tests\Unit;

use App;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    public function testUniqueEmail()  {

        $user = DB::table('users')->where('email', 'email@domain.com')->first();

        if (empty($user)) {
            $test_user = new User;

            $test_user->first_name = "John";
            $test_user->last_name = "Smith";
            $test_user->email = "email@domain.com";
            $test_user->password = "koineuiiH9jh&GH8^tg(7%^fgLK9hh*yg*5vbjk*tFG(Yf8(j";
            $test_user->remember_token = "kij(J&h*7g&bTf(h^gIuyB&*bn";

            $test_user->save();
        }

        $result = App\User::where('email', "email@domain.com")->get();

        $this->assertTrue(sizeof($result) == 1);
    }
}