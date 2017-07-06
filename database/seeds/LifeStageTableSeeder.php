<?php

use Illuminate\Database\Seeder;

class LifeStageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('life_stages')->insert([
            ['name' => '--', 'position' => 0],
            ['name' => 'Infant', 'position' => 1],
            ['name' => 'Baby', 'position' => 2],
            ['name' => 'Toddler', 'position' => 3],
            ['name' => 'Kindergarten', 'position' => 4],
            ['name' => 'Elementary', 'position' => 5],
            ['name' => 'Junior High', 'position' => 6],
            ['name' => 'High School', 'position' => 7],
            ['name' => '18-24', 'position' => 8],
            ['name' => '25-34', 'position' => 9],
            ['name' => '35-44', 'position' => 10],
            ['name' => '45-54', 'position' => 11],
            ['name' => '55-64', 'position' => 12],
            ['name' => '65+', 'position' => 13],
        ]);
    }
}
