<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WorkoutTableSeeder::class);
        $this->call(NutritionTableSeeder::class);
        $this->call(SocialFeedTableSeeder::class);
        $this->call(HeathTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
    }
}
