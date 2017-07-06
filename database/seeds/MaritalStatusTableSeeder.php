<?php

use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->insert([
            ['name' => '--', 'position' => 0],
            ['name' => 'Married', 'position' => 1],
            ['name' => 'Divorced', 'position' => 2],
            ['name' => 'Separated', 'position' => 3],
            ['name' => 'Widow', 'position' => 4],
            ['name' => 'Widower', 'position' => 5],
        ]);
    }
}
