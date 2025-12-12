<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'age',
        'email',
        'course_id',
        'skills',
        'gender_id'
    ];

    protected $casts = [
        'skills' => 'array',
        'age' => 'integer',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
}
