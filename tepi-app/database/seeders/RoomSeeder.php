<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Room::factory(10)->create();
        $rooms = [
            [
                'title' => 'Lab Pemrograman',
                'description' => 'Lab Pemrograman menyediakan lingkungan yang ideal untuk belajar dan mengembangkan keterampilan dalam berbagai bahasa pemrograman. Dilengkapi dengan komputer modern dan perangkat lunak terbaru, lab ini mendukung kegiatan praktikum dan proyek pengembangan perangkat lunak.',
                'picture' => '/images/rooms/Lab-203.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Bahasa',
                'description' => 'Lab Bahasa adalah tempat yang dirancang untuk memfasilitasi pembelajaran berbagai bahasa. Dilengkapi dengan perangkat audio-visual dan materi pembelajaran interaktif, lab ini membantu mahasiswa meningkatkan kemampuan bahasa asing mereka.',
                'picture' => '/images/rooms/Lab-Bahasa.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Multimedia',
                'description' => 'Lab Multimedia dirancang untuk mendukung pembelajaran dalam bidang media digital. Dengan peralatan seperti komputer grafis, kamera, dan perangkat lunak pengeditan, mahasiswa dapat mengasah keterampilan mereka dalam produksi multimedia.',
                'picture' => '/images/rooms/Lab-202.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Elektronika',
                'description' => 'Lab Elektronika menawarkan fasilitas lengkap untuk belajar dan praktik dalam bidang elektronika. Dilengkapi dengan komponen dan alat ukur elektronik, mahasiswa dapat melakukan eksperimen dan proyek dalam rangka memahami prinsip-prinsip elektronika.',
                'picture' => '/images/rooms/Lab-Elektronika.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Otomotif',
                'description' => 'Lab Otomotif merupakan fasilitas yang lengkap untuk kegiatan praktikum mahasiswa dalam bidang otomotif. Lab ini dilengkapi dengan peralatan modern dan teknologi terbaru untuk mendukung pembelajaran dan penelitian.',
                'picture' => '/images/rooms/Lab-Otomotif.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Robotika',
                'description' => 'Lab Robotika menyediakan lingkungan yang ideal untuk belajar dan mengembangkan sistem robotik. Dengan berbagai jenis robot dan perlengkapan canggih, mahasiswa dapat mengasah keterampilan mereka dalam pemrograman dan mekanik.',
                'picture' => '/images/rooms/Lab-Robotika.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Networking',
                'description' => 'Lab Networking didesain untuk memberikan pengalaman praktis dalam jaringan komputer. Lab ini dilengkapi dengan router, switch, dan perangkat jaringan lainnya untuk simulasi dan praktik langsung.',
                'picture' => '/images/rooms/Lab-Networking.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Kimia',
                'description' => 'Lab Kimia menyediakan berbagai peralatan laboratorium untuk percobaan dan penelitian kimia. Lab ini mendukung kegiatan praktikum dengan standar keamanan dan peralatan yang mutakhir.',
                'picture' => '/images/rooms/Lab-Kimia.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Fisika',
                'description' => 'Lab Fisika memungkinkan mahasiswa untuk melakukan eksperimen fisika dasar dan lanjutan. Dilengkapi dengan berbagai alat ukur dan peralatan fisika, lab ini mendukung pemahaman konsep-konsep fisika secara praktis.',
                'picture' => '/images/rooms/Lab-Fisika.jpg',
                'status' => '0'
            ],
            [
                'title' => 'Lab Sejarah',
                'description' => 'Lab Sejarah memberikan fasilitas untuk penelitian dan studi sejarah. Dengan koleksi artefak dan sumber daya digital, mahasiswa dapat menggali informasi sejarah dengan mendalam.',
                'picture' => '/images/rooms/Lab-Sejarah.jpg',
                'status' => '0'
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
