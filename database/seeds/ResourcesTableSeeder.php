<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            'name' => str_random(10),
            'user_id' => rand(1, 6),
            'type_id' => rand(1, 6),
            'has_cost' => rand(0, 1),
            'language_id' => rand(1, 6),
            'link' => str_random(20),
            'description' => str_random(50),
            'tags' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
