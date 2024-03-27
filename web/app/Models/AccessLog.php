<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'bus_id',
        'user_id',
        'card_token',
        'status',
        'message',
        'action',
        'type',
    ];

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActionAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setActionAttribute($value): void
    {
        $this->attributes['action'] = strtolower($value);
    }

    public function getStatusAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setStatusAttribute($value): void
    {
        $this->attributes['status'] = strtolower($value);
    }

    public function getTypeAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setTypeAttribute($value): void
    {
        $this->attributes['type'] = strtolower($value);
    }
}
