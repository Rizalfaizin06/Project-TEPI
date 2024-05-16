<?php

namespace Database\Seeders;

use App\Models\StudentGroup;
use Illuminate\Database\Seeder;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentGroups = [
            [
                'student_id' => '1',
                'category_id' => '1'
            ],
            [
                'student_id' => '2',
                'category_id' => '1'
            ],
            [
                'student_id' => '3',
                'category_id' => '4'
            ],
            [
                'student_id' => '4',
                'category_id' => '3'
            ],
            [
                'student_id' => '5',
                'category_id' => '2'
            ],
            [
                'student_id' => '6',
                'category_id' => '9'
            ],
            [
                'student_id' => '7',
                'category_id' => '6'
            ],
            [
                'student_id' => '3',
                'category_id' => '9'
            ],
            [
                'student_id' => '3',
                'category_id' => '10'
            ],
            [
                'student_id' => '3',
                'category_id' => '11'
            ],


        ];

        foreach ($studentGroups as $studentData) {
            StudentGroup::create($studentData);
        }
        // StudentGroup::factory(30)->create();
    }
}
