<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusBoardingPoint extends Model
{
    use HasFactory;

    protected $table = 'bus_boarding_pointS';

    protected $fillable = [
        'bus_id',
        'boarding_point_id',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function boardingPoint(): BelongsTo
    {
        return $this->belongsTo(BoardingPoint::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
