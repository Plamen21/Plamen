<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomework extends Model
{
    use HasFactory;

    protected $fillable = ['student_Id', 'course_Id', 'module_Id', 'lecture_Id', 'homework_status', 'grade', 'created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'module_id');
    }

    public function lecture()
    {
        return $this->belongsTo(ModuleLecture::class, 'lecture_id');
    }
}
