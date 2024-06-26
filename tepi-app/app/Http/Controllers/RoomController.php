<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\RoomAccess;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class RoomController extends Controller
{
    // public function index()
    // {
    //     return view('home', ["title" => "Booking", "rooms" => Room::with('facility')->get()]);
    // }
    public function index()
    {
        DB::statement("SET SQL_MODE=''");
        $now = Carbon::now();
        $room_state = request('status');
        $room_data = DB::table('room_accesses')
            ->select('room_accesses.id', 'room_accesses.student_id', 'room_accesses.date', 'room_accesses.time_start', 'room_accesses.time_end', 'room_accesses.description', 'rooms.title', 'rooms.picture')
            ->selectRaw('GROUP_CONCAT(student_group_categories.category SEPARATOR \',\') AS category')
            ->join('rooms', 'room_accesses.room_id', '=', 'rooms.id')
            ->join('student_group_categories', 'student_group_categories.id', '=', 'room_accesses.group_id')
            ->where(function ($query) use ($now, $room_state) {
                if ($room_state == "in_use") {
                    $query->orWhere(function ($query) use ($now) {
                        $query->where('room_accesses.time_start', '<', $now->format('H:i:s'))
                            ->where('room_accesses.time_end', '>', $now->format('H:i:s'))
                            ->where('room_accesses.date', '=', $now->format('Y-m-d'));
                    });
                } else if ($room_state == "was_use") {
                    $query->orWhere(function ($query) use ($now) {
                        $query->where('room_accesses.time_end', '<', $now->format('H:i:s'))
                            ->where('room_accesses.date', '=', $now->format('Y-m-d'));
                    });
                    $query->orWhere('room_accesses.date', '<', $now->format('Y-m-d'));

                } else if ($room_state == "will_use") {
                    $query->orWhere(function ($query) use ($now) {
                        $query->where('room_accesses.time_start', '>', $now->format('H:i:s'))
                            ->where('room_accesses.date', '=', $now->format('Y-m-d'));
                    });
                    $query->orWhere('room_accesses.date', '>', $now->format('Y-m-d'));

                }
            })
            ->groupBy('date', 'time_start', 'time_end', 'room_accesses.room_id')
            ->orderBy('date', 'desc')
            ->orderBy('time_start', 'desc')
            ->having('title', 'like', '%' . request('search') . '%')
            ->paginate(3);
        // $room_data = RoomAccess::with(['rooms'])

        //     ->get();
        return view('rooms', ["title" => "Rooms", "room_data" => $room_data]);
    }
    public function details(Request $request)
    {


        $room_data = $request->input('room_data');
        return view('room_details', ["title" => "Booking", "room_data" => $room_data]);
    }

    public function booking(Request $request)
    {
        RoomAccess::where('confirmation', 0)->delete();
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
        return view('room_booking', ["title" => "Booking", "booking_data" => $booking_data]);
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
            $request->validate([
                'rfid_user' => 'required|string',
            ]);

            $student = Student::where('rfid', $request->input('rfid_user'))->first();

            if (!$student) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Mahasiswa dengan rfid tersebut tidak ditemukan.',
                    'data' => [
                        'access' => false,
                    ]
                ], 404);
            }

            $updatedRows = RoomAccess::whereNull('student_id')->update(['student_id' => $student->id]);

            if ($updatedRows === 0) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Tidak ada data ruangan yang ditemukan.',
                    'data' => [
                        'access' => false,
                    ]
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Menambah penanggung jawab ruangan berhasil.',
                'data' => [
                    'access' => true,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => [
                    'access' => false,
                ]
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

        // foreach ($data_confirmation as $groupCategoryId => $roomAccesses) {
        //     $firstRoomAccess = $roomAccesses->first();

        //     echo "Group Category: {$firstRoomAccess->groupCategory->category}\n";

        //     foreach ($roomAccesses as $roomAccess) {
        //         echo "Room: {$roomAccess->rooms->title}, Student: {$roomAccess->student->name}\n";
        //     }
        // }
        $data = json_decode($data_confirmation, true);

        $groupCategories = [];

        foreach ($data as $item) {
            $groupCategories[] = $item['group_category']['category'];
        }


        $booking_data = [
            'booking' => [
                'date' => $data[0]['date'],
                'time_start' => $data[0]['time_start'],
                'time_end' => $data[0]['time_end'],
                'description' => $data[0]['description'],
            ],
            'student' => $data[0]['student'],
            'rooms' => $data[0]['rooms'],
            'group_category' => $groupCategories
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

        // return $booking_data;
        return view('room_confirmation', ["title" => "Booking", "booking_data" => $booking_data]);



    }


    public function confirm_booking()
    {
        RoomAccess::where('confirmation', 0)->update(['confirmation' => 1]);

        return redirect()->route('home_page');
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
                'data' => [
                    'access' => false,
                ]
            ], 404);
        } else {
            // $data = json_decode($student, true);
            $data = $student->toArray();

        }


        $category_ids = [];

        foreach ($data['student_group'] as $entry) {
            $category_ids[] = $entry['category_id'];
        }

        $category_ids = array_unique($category_ids);

        $found_dosen = false;
        foreach ($category_ids as $categoryId) {
            if ($categoryId == 1) {
                $found_dosen = true;
                break;
            }
        }

        if ($found_dosen) {
            $log = new AccessLog();
            $log->student_id = $student['id'];
            $log->room_id = $room_id;
            $log->message = "Akses Dosen Diterima";
            $log->save();
            return response()->json([
                'status' => 200,
                'message' => 'Akses selalu tersedia untuk dosen',
                'data' => [
                    'access' => true,
                ]
            ], 200);
        }

        $access = RoomAccess::whereIn('group_id', $category_ids)
            ->where('room_id', '=', $room_id)
            ->where('date', '=', date('Y-m-d'))
            ->where('time_start', '<', date('H:i:s'))
            ->where('time_end', '>', date('H:i:s'))
            ->where('confirmation', true)
            ->get();

        if ($access->isEmpty()) {
            $log = new AccessLog();
            $log->student_id = $student['id'];
            $log->room_id = $room_id;
            $log->message = "Akses ditolak";
            $log->save();
            return response()->json([
                'status' => 404,
                'message' => 'Akses tidak tersedia',
                'data' => [
                    'access' => false,
                ]
            ], 404);
        }

        $log = new AccessLog();
        $log->student_id = $student['id'];
        $log->room_id = $room_id;
        $log->message = "Akses diterima";
        $log->save();

        return response()->json([
            'status' => 200,
            'message' => 'Akses tersedia',
            'data' => [
                'access' => true,
                // 'data' => $access
                // 'id' => $access->id
            ]
        ], 200);
        // return $access;
    }




}
