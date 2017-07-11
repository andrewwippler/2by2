<?php

use Illuminate\Database\Seeder;

class VisitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visit_types')->insert([
            ['name' => 'Visit',
             'position' => 0,
             'icon' => 0,
             'color' => 0],

            ['name' => 'Call',
             'position' => 1,
             'icon' => 1,
             'color' => 0],

            ['name' => 'Text',
             'position' => 2,
             'icon' => 2,
             'color' => 0],

            ['name' => 'Email',
             'position' => 3,
             'icon' => 3,
             'color' => 0],

            ['name' => 'Letter',
             'position' => 4,
             'icon' => 4,
             'color' => 0],

            ['name' => 'Post Card',
             'position' => 5,
             'icon' => 5,
             'color' => 0],

            ['name' => 'Other',
             'position' => 6,
             'icon' => 6,
             'color' => 0],

        ]);
    }
}
