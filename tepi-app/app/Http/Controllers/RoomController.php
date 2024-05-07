<?php

namespace App\Http\Controllers;

use App\Models\RoomAccess;
use App\Models\Student;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // public function index()
    // {
    //     return view('home', ["title" => "Home", "rooms" => Room::with('facility')->get()]);
    // }
    public function details(Request $request)
    {
        $room_data = $request->input('room_data');
        return view('room_details', ["title" => "Home", "room_data" => $room_data]);
    }

    public function booking(Request $request)
    {
        $booking_data = $request->input();
        // $student = Student::with('student_group')->get();
        // $validatedData = $request->validate([
        //     'time_start' => 'required|date_format:H:i',
        //     'time_end' => 'required|date_format:H:i|after:time_start',
        //     'date' => 'required|date_format:Y-m-d',
        //     'group' => 'required|array',
        //     'description' => 'required|string',
        //     'room_id' => 'required|exists:rooms,id',
        // ]);

        // Simpan data ke dalam tabel Booking
        foreach ($booking_data['group'] as $groupId) {
            $booking = new RoomAccess();
            $booking->time_start = $booking_data['time_start'];
            $booking->time_end = $booking_data['time_end'];
            $booking->date = $booking_data['date'];
            $booking->group_id = $groupId; // Simpan ID grup langsung ke dalam kolom group
            $booking->description = $booking_data['description'];
            $booking->room_id = $booking_data['room_id'];
            $booking->student_id = null;
            $booking->confirmation = false;
            $booking->save();
        }

        // return "sets";
        return view('room_booking', ["title" => "Home", "booking_data" => $booking_data]);
    }
    public function check_booking_owner()
    {
        try {
            // Periksa apakah ada data dengan student_id null
            $hasNullStudentId = RoomAccess::whereNull('student_id')->exists();

            // Jika ada data dengan student_id null
            if ($hasNullStudentId) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Ada data dengan student_id null.',
                    'data' => true,
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Tidak ada data dengan student_id null.',
                    'data' => false,
                ]);
            }

        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function add_booking_owner(Request $request)
    {
        try {
            // Validasi data
            $request->validate([
                'rfid_user' => 'required|string',
            ]);

            // Temukan mahasiswa berdasarkan rfid
            $student = Student::where('rfid', $request->input('rfid_user'))->first();

            // Jika mahasiswa tidak ditemukan
            if (!$student) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Mahasiswa dengan rfid tersebut tidak ditemukan.',
                ], 404);
            }

            // Update room accesses dengan student_id dari mahasiswa yang ditemukan
            RoomAccess::whereNull('student_id')->update(['student_id' => $student->id]);

            // Redirect atau kirim respons sukses ke pengguna
            return response()->json([
                'status' => 'success',
                'message' => 'Room accesses berhasil diperbarui dengan student_id yang sesuai.',
            ]);

        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }


    }
    public function booking_confirmation()
    {
        // $data_confirmation = RoomAccess::with(['student', 'group_category'])->get();
        $data_confirmation = RoomAccess::with(['student', 'group_category', 'rooms'])
            ->where('confirmation', false)
            ->get();
        // $data_confirmation = RoomAccess::with(['student', 'group_category', 'rooms'])
        //     ->where('confirmation', false)
        //     ->get()
        //     ->groupBy('group_category_id');

        // Ambil satu hasil untuk setiap grup yang unik
        // foreach ($data_confirmation as $groupCategoryId => $roomAccesses) {
        //     $firstRoomAccess = $roomAccesses->first();

        //     // Cetak category hanya sekali
        //     echo "Group Category: {$firstRoomAccess->groupCategory->category}\n";

        //     // Cetak rooms dan student
        //     foreach ($roomAccesses as $roomAccess) {
        //         echo "Room: {$roomAccess->rooms->title}, Student: {$roomAccess->student->name}\n";
        //     }
        // }
        $data = json_decode($data_confirmation, true);

        $groupCategories = [];

        foreach ($data as $item) {
            $groupCategories[] = $item['group_category']['category'];
        }


        $data_booking = [
            'date' => $data[0]['date'],
            'time_start' => $data[0]['time_start'],
            'time_end' => $data[0]['time_end'],
            'description' => $data[0]['description'],
            'student' => $data[0]['student'],
            'rooms' => $data[0]['rooms'],
            'group_category' => $groupCategories
            // foreach ($data as $item) {
            //     $newItem = [
            //         'student' => $item['student'],
            //         'rooms' => $item['rooms'],
            //         'data' => $item['group_category'],
            //     ];
            //     unset($newItem['data']['student']);
            //     unset($newItem['data']['rooms']);
            //     $newData[] = $newItem;
            // },

        ];
        // foreach ($data as $item) {
        //     echo json_encode($item['student'], true);
        //     // $newItem = [
        //     //     'student' => $item['student'],
        //     //     'rooms' => $item['rooms'],
        //     //     'data' => $item['group_category'],
        //     // ];
        //     // unset($newItem['data']['student']);
        //     // unset($newItem['data']['rooms']);
        //     // $newData[] = $newItem;
        // }

        // $newData = [];
        // foreach ($data as $item) {
        //     $newItem = [
        //         'student' => $item['student'],
        //         'rooms' => $item['rooms'],
        //         'data' => $item['group_category'],
        //     ];
        //     unset($newItem['data']['student']);
        //     unset($newItem['data']['rooms']);
        //     $newData[] = $newItem;
        // }



        // $new2Data = [];
        // foreach ($newData as $item) {
        //     $newItem = [
        //         'student' => $item['student'],
        //         'rooms' => $item['rooms'],
        //         'data_category' => [
        //             'category_' . $item['data']['id'] => $item['data']
        //         ]
        //     ];
        //     $new2Data[] = $newItem;
        // }

        // $newJsonData = json_encode(['' => $newData], JSON_PRETTY_PRINT);
        // echo $newJsonData;

        return $data_booking;


    }


    public function access(Request $request)
    {
        $rfid_user = $request->input('rfid_user');
        $room_id = $request->input('room_id');
        $student = Student::with('student_group')
            ->where('rfid', $rfid_user)
            ->first();

        if (!$student) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
            ], 404);
        } else {
            // Lakukan operasi json_decode() hanya jika $student tidak null
            // $data = json_decode($student, true);
            $data = $student->toArray();

        }


        // Inisialisasi array kosong untuk menyimpan category_ids
        $category_ids = [];

        // Loop melalui setiap entri dalam properti student_group
        foreach ($data['student_group'] as $entry) {
            // Tambahkan category_id ke dalam array category_ids
            $category_ids[] = $entry['category_id'];
        }

        // Hapus nilai duplikat jika diperlukan
        $category_ids = array_unique($category_ids);

        $access = RoomAccess::whereIn('group_id', $category_ids)
            ->where('room_id', '=', $room_id)  // Filter by current date
            ->where('date', '=', date('Y-m-d'))  // Filter by current date
            ->where('time_start', '<', date('H:i:s'))  // Filter for entries where time_start is before current time
            ->where('time_end', '>', date('H:i:s'))  // Filter for entries where time_end is after current time
            ->where('confirmation', true)
            ->get();
        // Jika akses tidak ada, kembalikan respons false
        if ($access->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Akses tidak tersedia',
                'data' => [
                    'access' => false,
                ]
            ], 404);
        }

        // Jika akses tersedia, kembalikan respons true
        return response()->json([
            'status' => 200,
            'message' => 'Akses tersedia',
            'data' => [
                'access' => true,
                // 'data' => $access
                // 'id' => $access->id // Anda bisa sesuaikan dengan kolom yang sesuai untuk ID
            ]
        ], 200);
        // return $access;
    }




}
