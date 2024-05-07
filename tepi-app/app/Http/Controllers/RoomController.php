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
        return $request->input();
        // $student = Student::with('student_group')->get();
        // return view('room_booking', ["title" => "Home", "student_data" => $student]);
    }


    public function access(Request $request)
    {
        $rfid_user = $request->input('rfid_user');
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
            ->where('date', '=', date('Y-m-d'))  // Filter by current date
            ->where('time_start', '<', date('H:i:s'))  // Filter for entries where time_start is before current time
            ->where('time_end', '>', date('H:i:s'))  // Filter for entries where time_end is after current time
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
