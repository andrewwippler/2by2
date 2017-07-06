<?php

use Illuminate\Database\Seeder;

class ProspectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prospect_statuses')->insert([
            ['name' => 'Active', 'position' => 0],
            ['name' => 'Inactive', 'position' => 1],
            ['name' => 'Dead End', 'position' => 2],
        ]);
    }
}
