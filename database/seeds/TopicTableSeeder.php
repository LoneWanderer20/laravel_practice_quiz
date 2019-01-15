<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Topic::class, 10)->create();
        //DB::table('topics')->insert([
            //"name" => str_random(10),
            //"question_count" => 10
        //]);
    }
}
