<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'English', 'position' => 0],
            ['name' => 'Korean', 'position' => 2],
            ['name' => 'Sign Language', 'position' => 3],
            ['name' => 'Spanish', 'position' => 1],
        ]);
    }
}
