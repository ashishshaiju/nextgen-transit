<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number_plate',
        'capacity',
        'bus_no',
        'description',
        'destination',
    ];

    public function busBoardingPoints(): HasMany
    {
        return $this->hasMany(BusBoardingPoint::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function driver(): hasMany
    {
        return $this->hasMany(Driver::class);
    }

    // access logs for the bus
    public function accessLogs(): HasMany
    {
        return $this->hasMany(AccessLog::class);
    }
}
