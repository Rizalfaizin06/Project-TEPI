<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Student::factory(10)->create();
        $students = [
            [
                'name' => 'Prof. Putra Wijaya',
                'avatar' => '/images/avatars/dosen_cowo.png',
                'NIM' => '87654321',
                'email' => 'putra@example.com',
                'rfid' => '1468DB74',
            ],
            [
                'name' => 'Dr. Intan Sari Dewi',
                'avatar' => '/images/avatars/dosen_cewe.png',
                'NIM' => '87654321',
                'email' => 'intan@example.com',
                'rfid' => 'E477B374',
            ],
            [
                'name' => 'Margaretha Maharani',
                'avatar' => '/images/avatars/cewe.png',
                'NIM' => '12345678',
                'email' => 'marga@example.com',
                'rfid' => '5405E774',
            ],
            [
                'name' => 'Claudia Yossi',
                'avatar' => '/images/avatars/cewe.png',
                'NIM' => '87654321',
                'email' => 'claudia@example.com',
                'rfid' => '1427D674',
            ],
            [
                'name' => 'Ririn Dwi',
                'avatar' => '/images/avatars/cewe.png',
                'NIM' => '87654321',
                'email' => 'ririn@example.com',
                'rfid' => '8479EE74',
            ],
            [
                'name' => 'Grace Jane',
                'avatar' => '/images/avatars/cewe.png',
                'NIM' => '87654321',
                'email' => 'grace@example.com',
                'rfid' => '04ADE774',
            ],
            [
                'name' => 'Aprilia Yustiana Putri',
                'avatar' => '/images/avatars/lia.png',
                'NIM' => '87654321',
                'email' => 'lia@example.com',
                'rfid' => '5450C474',
            ],

        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }
    }
}
