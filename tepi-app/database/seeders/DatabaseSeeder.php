<?php

namespace Database\Seeders;

// use App\Models\Facility;
// use App\Models\FacilityCategory;
// use App\Models\Room;
// use App\Models\Student;
// use App\Models\StudentGroup;
// use App\Models\StudentGroupCategorie;
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
        // \App\Models\User::factory(10)->create();
        // Student::factory(10)->create();
        // \App\Models\Room::factory(10)->create();
        // \App\Models\Facility::factory(100)->create();
        // \App\Models\FacilityCategory::factory(10)->create();
        // \App\Models\StudentGroup::factory(10)->create();
        // \App\Models\StudentGroupCategorie::create(["category" => "Perpajakan 21"]);
        // \App\Models\StudentGroupCategorie::create(["category" => "TI 21"]);
        // \App\Models\StudentGroupCategorie::create(["category" => "SI 21"]);
        // \App\Models\StudentGroupCategorie::create(["category" => "Management 21"]);
        // \App\Models\StudentGroupCategorie::create(["category" => "Psikologi 21"]);
        // $this->call(StudentSeeder::class);

        $this->call([
            StudentSeeder::class,
            RoomSeeder::class,
            FacilitySeeder::class,
            FacilityCategorySeeder::class,
            StudentGroupSeeder::class,
            StudentGroupCategorieSeeder::class,
        ]);
    }
}
