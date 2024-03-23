<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'occupation',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'guardian_student', 'guardian_id', 'student_id')->withPivot('relationship');
    }
}
