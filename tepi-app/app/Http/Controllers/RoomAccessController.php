<?php

namespace App\Http\Controllers;

use App\Models\RoomAccess;
use App\Http\Requests\StoreRoomAccessRequest;
use App\Http\Requests\UpdateRoomAccessRequest;

class RoomAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // SELECT * FROM `room_accesses` WHERE time_start < NOW() AND time_end > NOW() AND group_id = "3 ";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomAccessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomAccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomAccess  $roomAccess
     * @return \Illuminate\Http\Response
     */
    public function show(RoomAccess $roomAccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomAccess  $roomAccess
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomAccess $roomAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomAccessRequest  $request
     * @param  \App\Models\RoomAccess  $roomAccess
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomAccessRequest $request, RoomAccess $roomAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomAccess  $roomAccess
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomAccess $roomAccess)
    {
        //
    }
}
