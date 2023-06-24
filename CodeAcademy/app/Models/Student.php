<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses');
    }

    public function studentDetails()
    {
        return $this->hasOne(StudentsDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absences()
    {
        return $this->hasMany(StudentAbsence::class, 'student_id');
    }
    public function homework(){
        return $this->hasMany(StudentHomework::class,'student_id');
    }
    public function projects(){
        return $this->hasMany(StudentProject::class,'student_id');
    }

}
