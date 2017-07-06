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
            ['name' => '--', 'position' => 0],
            ['name' => 'Husband', 'position' => 1],
            ['name' => 'Wife', 'position' => 2],
            ['name' => 'Fiance', 'position' => 3],
            ['name' => 'Boyfriend', 'position' => 4],
            ['name' => 'Girlfriend', 'position' => 5],
            ['name' => 'Son', 'position' => 6],
            ['name' => 'Daughter', 'position' => 7],
            ['name' => 'Uncle', 'position' => 8],
            ['name' => 'Aunt', 'position' => 9],
            ['name' => 'Niece', 'position' => 10],
            ['name' => 'Nephew', 'position' => 11],
            ['name' => 'Grandmother', 'position' => 12],
            ['name' => 'Grandfather', 'position' => 13],
            ['name' => 'Granddaughter', 'position' => 14],
            ['name' => 'Grandson', 'position' => 15],
        ]);
    }
}
