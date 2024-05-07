<?php

namespace App\Http\Controllers;

use App\Models\StudentGroupCategorie;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function getGroupCategory(Request $request)
    {
        $group = [];
        if ($search = $request->search) {
            $group = StudentGroupCategorie::where("category", "like", "%" . $search . "%")->get();
        } else {
            $group = StudentGroupCategorie::get();
        }
        return response()->json($group);
    }
}
