<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Visit Types
        $this->call(VisitTypesTableSeeder::class);

        // People Types
        $this->call(RelationshipsTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(ProspectStatusTableSeeder::class);
        $this->call(SpiritualConditionTableSeeder::class);
        $this->call(LifeStageTableSeeder::class);

        // Household Types
        $this->call(DepartmentTableSeeder::class);
    }
}
