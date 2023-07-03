<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'students_courses', 'user_id', 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absences()
    {
        return $this->hasMany(StudentAbsence::class, 'student_id');
    }

    public function homework()
    {
        return $this->hasMany(StudentHomework::class, 'student_id');
    }

    public function projects()
    {
        return $this->hasMany(StudentProject::class, 'student_id');
    }

}
