<?php

use Illuminate\Database\Seeder;

class SundaySchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sunday_schools')->insert([
            ['name' => '--', 'position' => 0],
        ]);
    }
}
