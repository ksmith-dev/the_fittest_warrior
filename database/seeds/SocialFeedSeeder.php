<?php

use Illuminate\Database\Seeder;

class SocialFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SocialFeed::class, 10)->create();
    }
}
