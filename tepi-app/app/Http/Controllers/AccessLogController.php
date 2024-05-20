<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Http\Requests\StoreAccessLogRequest;
use App\Http\Requests\UpdateAccessLogRequest;

class AccessLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accest_list = AccessLog::with('student', 'room')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('access_log', ["title" => "Home", "accest_list" => $accest_list]);

    }

}
