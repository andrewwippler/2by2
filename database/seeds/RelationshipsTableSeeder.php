<?php

use Illuminate\Database\Seeder;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationships')->insert([
            ['name' => 'Husband'],
            ['name' => 'Wife'],
            ['name' => 'Fiance'],
            ['name' => 'Boyfriend'],
            ['name' => 'Girlfriend'],
            ['name' => 'Son'],
            ['name' => 'Daughter'],
            ['name' => 'Uncle'],
            ['name' => 'Aunt'],
            ['name' => 'Niece'],
            ['name' => 'Nephew'],
            ['name' => 'Grandmother'],
            ['name' => 'Grandfather'],
            ['name' => 'Granddaughter'],
            ['name' => 'Grandson'],
        ]);
    }
}
