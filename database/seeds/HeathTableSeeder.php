<?php

use App\Health;
use Illuminate\Database\Seeder;

class HeathTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Health::class, 5)->create();
    }
}