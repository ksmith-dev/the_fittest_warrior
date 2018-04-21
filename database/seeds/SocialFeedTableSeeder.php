<?php

use App\SocialFeed;
use Illuminate\Database\Seeder;

class SocialFeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SocialFeed::class, 10)->create();
    }
}