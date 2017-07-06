<?php

use Illuminate\Database\Seeder;

class SpiritualConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spiritual_conditions')->insert([
            ['name' => '--', 'position' => 0],
            ['name' => 'Attended', 'position' => 1],
            ['name' => 'Saved', 'position' => 2],
            ['name' => 'Member', 'position' => 3],
            ['name' => 'Baptized', 'position' => 4],
            ['name' => 'Sunday School', 'position' => 5],
        ]);
    }
}
