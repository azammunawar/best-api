<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => rand(1, 16),
            'user_img' => 'assets/images/video_byuser.jpg',
            'user_name' => str_random(10),
            'comment_text' => str_random(30),
            'parent_comment' => false,
            'parent_comment_id' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
