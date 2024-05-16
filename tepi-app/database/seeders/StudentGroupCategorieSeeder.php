<?php

namespace Database\Seeders;

use App\Models\StudentGroupCategorie;
use Illuminate\Database\Seeder;

class StudentGroupCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Dosen',
            'Perpajakan 21',
            'Sastra Inggris 21',
            'TI 21',
            'SI 21',
            'Management 21',
            'UKM Dance',
            'UKM TI',
            'UKM Psikologi',
            'TGCU',
            'PMK',
        ];

        foreach ($categories as $category) {
            StudentGroupCategorie::create(['category' => $category]);
        }
    }
}
