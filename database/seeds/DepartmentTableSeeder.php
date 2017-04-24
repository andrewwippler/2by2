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
            ['name' => 'English'],
            ['name' => 'Korean'],
            ['name' => 'Sign Language'],
            ['name' => 'Spanish'],
        ]);
    }
}
