<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        DB::statement("SET SQL_MODE=''");

        // $rooms = Room::select([
        //     'rooms.id',
        //     DB::raw('GROUP_CONCAT(f.category_id SEPARATOR \',\') AS facilities'),
        // ])
        //     ->join('facilities AS f', 'f.room_id', '=', 'rooms.id')
        //     ->leftJoin('room_accesses AS RA', 'RA.room_id', '=', 'rooms.id')
        //     ->groupBy('rooms.id')
        //     ->get();

        //         use Illuminate\Database\Eloquent\Builder;
// use DB;

        $rooms = Room::select([
            'rooms.id',
            'rooms.title',
            'rooms.picture',
            'rooms.description',
            DB::raw('MIN(RA.date) AS date'),
            DB::raw('MIN(RA.time_start) AS time_start'),
            DB::raw('MAX(RA.time_end) AS time_end'),
            DB::raw('GROUP_CONCAT(DISTINCT fc.category SEPARATOR \',\') AS facilities'),
            DB::raw('CASE WHEN EXISTS(SELECT 1 FROM room_accesses AS a WHERE a.room_id = rooms.id AND a.date = CURDATE() AND a.time_start < NOW() AND a.time_end > NOW()) THEN TRUE ELSE FALSE END AS room_state'),
        ])
            ->join('facilities AS f', 'f.room_id', '=', 'rooms.id')
            ->join('facility_categories AS fc', 'f.category_id', '=', 'fc.id')
            ->leftJoin('room_accesses AS RA', 'RA.room_id', '=', 'rooms.id')
            ->groupBy('rooms.id')
            ->get();

        // $rooms = DB::table('rooms')
        //     ->leftJoin('room_accesses', 'rooms.id', '=', 'room_accesses.room_id')
        //     ->groupBy('rooms.id')
        //     ->get();
        // $rooms = Room::with('facility')->get();
        // $rooms = Room::select([
        //     '*',
        //     // 'rooms.title', // Replace 'name' with the actual column name for room title
        //     // Other required columns from rooms table
        // ])
        //     ->selectRaw('CASE WHEN room_accesses.date = CURDATE() AND room_accesses.time_start < NOW() AND room_accesses.time_end > NOW() THEN TRUE ELSE FALSE END AS status_ruangan')
        //     // ... rest of the code remains the same

        //     ->leftJoin('room_accesses', function ($join) {
        //         $join->on('room_accesses.room_id', '=', 'rooms.id');
        //     })
        //     ->groupBy('rooms.id')
        //     ->get();





        // $roomsQuery = DB::table('rooms as R')
        //     ->leftJoin('room_accesses as RA', 'R.id', '=', 'RA.room_id')
        //     ->join('facilities as F', 'F.room_id', '=', 'R.id')
        //     ->groupBy('R.id')
        //     ->select('R.*');

        // $roomsWithFacilities = $roomsQuery->get();

        // $rightJoinedRooms = Room::whereIn('id', function ($query) use ($roomsQuery) {
        //     $query->select('facilities.room_id')
        //         ->from($roomsQuery);
        // })->get();


        // $rooms = Room::select([
        //     'rooms.id',
        //     'rooms.title',
        //     // 'rooms.name', // Replace 'name' with the actual column name for room title
        //     // Other required columns from rooms table
        //     DB::raw('CASE WHEN room_accesses.date = CURDATE() AND room_accesses.time_start < NOW() AND room_accesses.time_end > NOW() THEN TRUE ELSE FALSE END AS status_ruangan'),
        // ])
        //     ->leftJoin('room_accesses', function ($join) {
        //         $join->on('room_accesses.room_id', '=', 'rooms.id');
        //     })
        //     ->groupBy('rooms.id', 'room_accesses.date', 'room_accesses.time_start', 'room_accesses.time_end', 'rooms.title') // Include all three columns in GROUP BY
        //     ->with('roomAccesses') // Eagerly load RoomAccess data
        //     ->get();

        // $rooms = DB::selectRaw('SELECT *, CASE WHEN room_accesses.date = CURDATE() AND room_accesses.time_start < NOW() AND room_accesses.time_end > NOW() THEN TRUE ELSE FALSE END AS status_ruangan FROM rooms LEFT JOIN room_accesses ON room_accesses.room_id = rooms.id GROUP BY rooms.id', []);




        return view('home', ["title" => "Home", "rooms" => $rooms]);
    }


}
