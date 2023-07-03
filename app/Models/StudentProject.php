<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    protected $fillable = ['student_Id', 'course_Id', 'module_Id', 'project_name', 'project_score', 'created_at', 'updated_at'];
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
