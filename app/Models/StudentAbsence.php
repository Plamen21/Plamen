<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAbsence extends Model
{
    use HasFactory;
    protected $fillable = ['student_Id', 'course_Id', 'module_Id', 'lecture_Id', 'absence', 'absence_note', 'created_at', 'updated_at'];
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
        return $this->belongsTo(CoursesModule::class, 'module_id');
    }
    public function lecture()
    {
        return $this->belongsTo(ModulesLecture::class, 'lecture_id');
    }
}
