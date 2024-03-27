<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusBoardingPoint extends Model
{
    use HasFactory;

    protected $table = 'bus_boarding_points';

    protected $fillable = [
        'bus_id',
        'boarding_point_id',
        'morning_reach_time',
        'evening_reach_time',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function boardingPoint(): BelongsTo
    {
        return $this->belongsTo(BoardingPoint::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getStudentCountAttribute()
    {
        return $this->user()->role('student')->count();
    }

    public function getDriverCountAttribute()
    {
        return $this->user()->role('driver')->count();
    }

    public function getGuardianCountAttribute()
    {
        return $this->user()->role('student')->with('guardians')->get()->pluck('guardians')->flatten()->count();
    }

    public function getStaffCountAttribute()
    {
        return $this->user()->role('staff')->count();
    }

    // get the total number of people in the bus
    public function getTotalPeopleAttribute()
    {
        return $this->user()->count();
    }

    // get seats available in the bus
    public function getSeatsAvailableAttribute()
    {
        return $this->bus->capacity - $this->user()->count();
    }
}
