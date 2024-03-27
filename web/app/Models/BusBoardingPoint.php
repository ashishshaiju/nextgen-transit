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
}
