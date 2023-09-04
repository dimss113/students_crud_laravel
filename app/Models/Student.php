<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    // apabila nama tabel adalah students maka tidak perlu menuliskan kode dibawah ini
    protected $table = 'students';

    // apabila nama primaryKey adalah id maka tidak perlu menuliskan kode dibawah ini
    protected $primaryKey = "id";

    public $incrementing = true;

    // tipe data primary key
    // apabila tipe data primary key adalah int maka tidak perlu menuliskan kode dibawah ini
    protected $keyType = "int";

    // apabila terdapat created_at dan updated_at maka tidak perlu menuliskan kode dibawah
    // public $timestamps = true;

    // digunakan agar kita dapat menambahkan data ke dalam tabel dengan mass assignment dengan eloquent ORM
    protected $fillable = ['name', 'class_id', 'nrp', 'gender', 'created_at', 'updated_at', 'image'];


    // add relation many to one or one to many inverse 
    /**
     * Get the class that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class (): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

    /**
     * The extracurriculars that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurriculars(): BelongsToMany
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurriculars', 'student_id', 'extracurricular_id');
    }

}