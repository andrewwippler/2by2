<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'See anything, Do Anything'
            ],
            [
                'name' => 'team-leader',
                'display_name' => 'Team Leader',
                'description' => 'Team/Group Owner'
            ],
            [
                'name' => 'class-leader',
                'display_name' => 'Class Leader',
                'description' => 'Teacher/Leader of a class'
            ],
        ];

        foreach ($role as $key => $value) {
            \App\Role::create($value);
        }
    }
}
