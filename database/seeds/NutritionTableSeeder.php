<?php

use Illuminate\Database\Seeder;

class NutritionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Nutrition::class, 100)->create();
    }
}
