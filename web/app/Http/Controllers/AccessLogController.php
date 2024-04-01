<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Http\Requests\StoreAccessLogRequest;
use App\Http\Requests\UpdateAccessLogRequest;
use App\Models\Bus;

class AccessLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccessLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function busShow(AccessLog $accessLog, Bus $bus)
    {

        // check if the authenticated user is authorized to view the bus
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

        // Access Logs for a specific bus
        $accessLogs = $bus->accessLogs()->latest()->paginate(10);

        return view('roles.admin.access-logs', compact('accessLogs', 'bus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessLog $accessLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccessLogRequest $request, AccessLog $accessLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessLog $accessLog)
    {
        //
    }
}
