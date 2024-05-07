<?php

namespace App\Http\Controllers;

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
}
