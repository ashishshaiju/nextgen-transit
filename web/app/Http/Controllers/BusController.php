<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;

class BusController extends Controller
{

    /**
     * The endpoint where all the cbms machines will communicate with the server
     *
     */
    public function core()
    {
        // check if the request has the required parameters
        if (!request()->has('bus_id') || !request()->has('card_id')) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        // check if the bus exists

        // check if the system is in assigner mode

        // if the system is in assigner mode, assign the card to the student who is mentioned in the assigner mode json object

        // if not, system is in validation mode. check if gthe card exists

        // check if the card is assigned to the student

        // check if the bus is assigned to the student

        // check the fee status of the student

        // record the activity

        // return the response to the cbms machine
    }



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
    public function store(StoreBusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusRequest $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
