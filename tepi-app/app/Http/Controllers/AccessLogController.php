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
        //
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
     * @param  \App\Http\Requests\StoreAccessLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccessLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessLog  $accessLog
     * @return \Illuminate\Http\Response
     */
    public function show(AccessLog $accessLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessLog  $accessLog
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessLog $accessLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccessLogRequest  $request
     * @param  \App\Models\AccessLog  $accessLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccessLogRequest $request, AccessLog $accessLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessLog  $accessLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessLog $accessLog)
    {
        //
    }
}
