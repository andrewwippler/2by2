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
            ['name' => 'Visit'],
            ['name' => 'Call'],
            ['name' => 'Text'],
            ['name' => 'Email'],
            ['name' => 'Letter'],
            ['name' => 'Post Card'],
            ['name' => 'Other'],
        ]);
    }
}
