<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\Bus;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use App\Models\BusBoardingPoint;
use App\Models\Settings;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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

        // create a new access log
        $accessLog = new AccessLog();
        $accessLog->bus_id = $busId;
        $accessLog->card_token = $cardToken;
        $accessLog->ip_address = request()->ip();

        // check if the bus exists
        $bus = Bus::find($busId);
        if (!$bus) {
            $accessLog->status = 'failed';
            $accessLog->message = 'Bus not found';
            $accessLog->action = 'CBMS Machine';
            $accessLog->type = 'in';
            $accessLog->save();
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
                    $accessLog->status = 'failed';
                    $accessLog->message = 'Card already assigned';
                    $accessLog->action = 'Assigner';
                    $accessLog->type = 'non';
                    $accessLog->save();
                    return response()->json(['message' => 'Card already assigned'], 400);
                }

                // check if the student exists
                $student = Student::find($assignerModeData->student_id);
                if (!$student) {
                    $accessLog->status = 'failed';
                    $accessLog->message = 'Student not found';
                    $accessLog->user_id = $assignerModeData->student_id;
                    $accessLog->action = 'Assigner';
                    $accessLog->type = 'non';
                    $accessLog->save();
                    return response()->json(['message' => 'Student not found'], 404);
                }

                // assign the card to the student
                $student->user->card_token = $cardToken;
                $student->user->save();

                // record the activity
                $accessLog->status = 'success';
                $accessLog->message = 'Card assigned successfully';
                $accessLog->action = 'Assigner';
                $accessLog->type = 'non';
                $accessLog->user_id = $student->user_id;
                $accessLog->save();

                // reset the assigner mode
                $assignerMode->is_active = false;
                $assignerMode->value = json_encode(['bus_id' => null, 'student_id' => null]);
                $assignerMode->save();

                // return the response to the cbms machine
                return response()->json(['message' => 'Card assigned successfully'], 201);
            }
        }

        // if not, system is in validation mode.

        // check if the card exists for a user which is linked from students model
        // retrieve the student who is using the card
        $user = User::where('card_token', $cardToken)->first();

        // check if the user exists
        if (!$user) {
            $accessLog->status = 'failed';
            $accessLog->message = 'Card not found';
            $accessLog->action = 'CBMS Machine';
            $accessLog->type = 'in';
            $accessLog->save();
            return response()->json(['message' => 'Card not assigned'], 404);
        }

        $student = $user->student;

        // check if the bus is assigned to the student who is using the card
        if ($user->busBoardingPoint->bus_id != $busId) {
            $accessLog->status = 'failed';
            $accessLog->message = 'Card not assigned due to bus mismatch';
            $accessLog->action = 'CBMS Machine';
            $accessLog->type = 'in';
            return response()->json(['message' => 'Card not assigned due to bus mismatch'], 400);
        }

        // check the fee status of the student
        // TODO: check the fee status of the student

        // record the activity
        $accessLog->status = 'success';
        $accessLog->message = 'Card validated successfully';
        $accessLog->action = 'CBMS Machine';
        $accessLog->type = 'in';
        $accessLog->user_id = $user->id;
        $accessLog->save();

        // return the response to the cbms machine
        return response()->json(['message' => 'Card validated successfully'], 200);
    }



    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // get all buses with boarding points.user and driver, also get the student count for each bus
        $buses = Bus::with(['busBoardingPoints.user', 'driver'])->get();

        // get member count for each bus
        $buses->map(function ($bus) {
            $bus->student_count = $bus->busBoardingPoints->sum('student_count');
            $bus->staff_count = $bus->busBoardingPoints->sum('staff_count');
            $bus->guardian_count = $bus->busBoardingPoints->sum('guardian_count');
            $bus->driver_count = $bus->busBoardingPoints->sum('driver_count');
            $bus->total_people = $bus->busBoardingPoints->sum('total_people');
            $bus->seats_available = $bus->busBoardingPoints->sum('seats_available');
            return $bus;
        });

        return view('roles.admin.manage-bus', compact('buses'));
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
