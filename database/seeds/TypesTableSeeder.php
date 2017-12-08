<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Lenguaje de programación'],
            ['name' => 'Framework'],
            ['name' => 'Librería'],
        ];

        DB::table('types')->insert($types);
    }
}
