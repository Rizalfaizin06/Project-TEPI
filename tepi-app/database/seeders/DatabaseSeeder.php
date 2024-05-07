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
        \App\Models\Facility::factory(100)->create();
        \App\Models\FacilityCategory::factory(10)->create();
        \App\Models\StudentGroup::factory(10)->create();
        \App\Models\StudentGroupCategorie::create(["category" => "Perpajakan 21"]);
        \App\Models\StudentGroupCategorie::create(["category" => "TI 21"]);
        \App\Models\StudentGroupCategorie::create(["category" => "SI 21"]);
        \App\Models\StudentGroupCategorie::create(["category" => "Management 21"]);
        \App\Models\StudentGroupCategorie::create(["category" => "Psikologi 21"]);

    }
}
