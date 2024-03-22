<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BoardingPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'distance_from_college',
    ];

    public function buses(): BelongsToMany
    {
        return $this->belongsToMany(Bus::class, 'bus_boarding_points');
    }
}
