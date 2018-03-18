<?php

use Illuminate\Database\Seeder;

class WorkoutReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkoutReport::class, 200)->create();
    }
}
