<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_semester_id',
        'due_amount',
        'due_date',
    ];

    public function studentSemester(): BelongsTo
    {
        return $this->belongsTo(StudentSemester::class);
    }

    public function getDueAmountAttribute($value): string
    {
        return number_format($value, 2);
    }

    public function setDueAmountAttribute($value): void
    {
        $this->attributes['due_amount'] = str_replace(',', '', $value);
    }

    public function getDueDateAttribute($value): string
    {
        return date('d-m-Y', strtotime($value));
    }

    public function setDueDateAttribute($value): void
    {
        $this->attributes['due_date'] = date('Y-m-d', strtotime($value));
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getTransactionsTotalAttribute(): string
    {
        // sum all transactions amount of successful transactions
        return number_format($this->transactions->where('transaction_type', 'success')->sum('amount'), 2);
    }
}
