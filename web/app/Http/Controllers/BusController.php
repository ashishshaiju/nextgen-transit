<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use App\Models\BusBoardingPoint;
use App\Models\Settings;
use App\Models\Student;
use App\Models\User;

class BusController extends Controller
{

    /**
     * The endpoint where all the cbms machines will communicate with the server
     *
     */
    public function core()
    {
        // check if the request has the required parameters
        if (!request()->has('bus_id') || !request()->has('card_token')) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        // sanitize the request parameters
        $busId = request()->bus_id;
        $cardToken = request()->card_token;

        // check if the bus exists
        $bus = Bus::find($busId);
        if (!$bus) {
            return response()->json(['message' => 'Bus not found'], 404);
        }

        // check if the system is in assigner mode
        $assignerMode = Settings::where('key', 'assigner_mode')->first();

        // if the system is in assigner mode, assign the card to the student who is mentioned in the assigner mode json object
        if ($assignerMode && $assignerMode->is_active) {
            $assignerModeData = json_decode($assignerMode->value);

            if ($assignerModeData->bus_id == $busId) {
                // check if the card exists
                $user = User::where('card_token', $cardToken)->first();
                if ($user) {
                    return response()->json(['message' => 'Card already assigned'], 400);
                }

                // check if the student exists
                $student = Student::find($assignerModeData->student_id);
                if (!$student) {
                    return response()->json(['message' => 'Student not found'], 404);
                }

                // assign the card to the student
                $student->user->card_token = $cardToken;
                $student->user->save();

                // record the activity
                // TODO: record the activity

                // reset the assigner mode
                $assignerMode->is_active = false;
                $assignerMode->value = json_encode(['bus_id' => null, 'student_id' => null]);
                $assignerMode->save();

                // return the response to the cbms machine
                return response()->json(['message' => 'Card assigned successfully'], 200);

            } else {

                return response()->json(['message' => 'Assigner mode is on'], 400);
            }
        }


        //check if the card exists for a user which is linked from students model
        // retrieve the student who is using the card
        $user = User::where('card_token', $cardToken)->first();
        $student = $user->student;
        if (!$user) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        // check if the bus is assigned to the student who is using the card
        if ($student->bus_id !== $busId) {
            return response()->json(['message' => 'Card not assigned to the bus'], 400);
        }

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
