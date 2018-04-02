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
        $this->call(TrainingTableSeeder::class);
        $this->call(SessionTableSeeder::class);
        $this->call(WorkoutTableSeeder::class);
        $this->call(WorkoutReportTableSeeder::class);
        $this->call(NutritionTableSeeder::class);
        $this->call(SocialFeedSeeder::class);
        $this->call(HeathTableSeeder::class);
    }
}
