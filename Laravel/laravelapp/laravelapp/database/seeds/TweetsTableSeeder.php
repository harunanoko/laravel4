<?php

use Illuminate\Database\Seeder;
use App\Tweet;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Tweet::create([
                'user_id' => $i,
                'title' => 'これはテスト' .$i,
                'tweet' => 'これはテストです' .$i,
            ]);
        }
    }
}
