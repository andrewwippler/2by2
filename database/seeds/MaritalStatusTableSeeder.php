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
        DB::table('maritial_statuses')->insert([
            ['name' => 'Married'],
            ['name' => 'Divorced'],
            ['name' => 'Separated'],
            ['name' => 'Widow'],
            ['name' => 'Widower'],
        ]);
    }
}
