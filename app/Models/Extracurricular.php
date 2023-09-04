<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Student;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'extracurriculars';

    /**
     * Get the user that owns the Extracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_extracurriculars', 'extracurricular_id', 'student_id');
    }

}