<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'class';

    protected $fillable = [
        'name',
        'teacher_id'
    ];

    /**
     * Get all of the comments for the ClassRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    /**
     * The extracurriculars that belong to the ClassRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurriculars(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_extracurriculars', 'extracurricular_id', 'student_id');
    }

    /**
     * Get the teachers that owns the ClassRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teachers(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}