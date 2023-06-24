<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    use HasFactory;
    public function students(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function module(){
        return $this->belongsTo(CoursesModule::class,'module_id');
    }
}
