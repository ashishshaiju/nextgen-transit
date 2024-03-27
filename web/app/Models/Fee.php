<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
