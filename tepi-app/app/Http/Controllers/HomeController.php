<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::with('facility')->get();
        return view('home', ["title" => "Home", "rooms" => $rooms]);
    }


}
