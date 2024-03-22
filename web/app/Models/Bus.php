<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function boardingPoints(): BelongsToMany
    {
        return $this->belongsToMany(BoardingPoint::class);
    }
}
