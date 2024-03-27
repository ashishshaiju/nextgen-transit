<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_semester_id',
        'amount',
        'transaction_date',
        'transaction_type',
    ];

    public function studentSemester(): BelongsTo
    {
        return $this->belongsTo(StudentSemester::class);
    }

    public function getTransactionTypeAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setTransactionTypeAttribute($value): void
    {
        $this->attributes['transaction_type'] = strtolower($value);
    }

    public function getAmountAttribute($value): string
    {
        return number_format($value, 2);
    }

    public function setAmountAttribute($value): void
    {
        $this->attributes['amount'] = str_replace(',', '', $value);
    }
}
