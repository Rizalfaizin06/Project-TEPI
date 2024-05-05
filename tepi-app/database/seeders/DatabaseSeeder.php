<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Student::factory(10)->create();
        \App\Models\Room::factory(10)->create();
        \App\Models\Facility::factory(50)->create();
        \App\Models\FacilityCategory::factory(10)->create();

    }
}
