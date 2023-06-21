<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsCourse extends Model
{
    use HasFactory;
    protected $table ='students_courses';

    public function students(){
        return $this->hasMany(Student::class,'student_id');
    }

    public function courses(){
        return $this->hasMany(Course::class,'course_id');
    }
}
