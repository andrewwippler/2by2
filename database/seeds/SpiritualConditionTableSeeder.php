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
            ['name' => 'Attended'],
            ['name' => 'Saved'],
            ['name' => 'Member'],
            ['name' => 'Baptized'],
            ['name' => 'Sunday School'],
        ]);
    }
}
