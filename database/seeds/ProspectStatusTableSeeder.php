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
            ['name' => 'Active'],
            ['name' => 'Inactive'],
            ['name' => 'Dead End'],
        ]);
    }
}
