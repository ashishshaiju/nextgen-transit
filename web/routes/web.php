<?php

use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\BusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        // TODO: show system status if in validation mode or assigner mode.

        return view('dashboard');
    })->name('dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/buses', [BusController::class, 'index',])->name('admin.manage-bus');

    Route::get('/semesters', function () {
        // get all student semesters with student info and semester info for the current authenticated user
        $semesters = auth()->user()->student->studentSemesters()->with('semester')->get();
        return view('roles.student.semesters', compact('semesters'));
    })->name('student.semester');

    Route::get('/access-logs/{bus}', [AccessLogController::class, 'busShow',])->name('admin.manage-bus.access-logs');

});
