<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'name' => str_random(10),
            'likes' => (rand(0, 99)),
            'comments' => (rand(0,99)),
            'hottest' => (rand(0,99)),
            'location' => ('Karachi, Pakistan'),
            'post_img' => 'assets/images/video_thumb.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
