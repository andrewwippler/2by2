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
            ['name' => 'Infant'],
            ['name' => 'Baby'],
            ['name' => 'Toddler'],
            ['name' => 'Kindergarten'],
            ['name' => 'Elementary'],
            ['name' => 'Junior High'],
            ['name' => 'High School'],
            ['name' => '18-24'],
            ['name' => '25-34'],
            ['name' => '35-44'],
            ['name' => '45-54'],
            ['name' => '55-64'],
            ['name' => '65+'],
        ]);
    }
}
