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
            ['name' => 'Visit', 'position' => 0],
            ['name' => 'Call', 'position' => 1],
            ['name' => 'Text', 'position' => 2],
            ['name' => 'Email', 'position' => 3],
            ['name' => 'Letter', 'position' => 4],
            ['name' => 'Post Card', 'position' => 5],
            ['name' => 'Other', 'position' => 6],
        ]);
    }
}
