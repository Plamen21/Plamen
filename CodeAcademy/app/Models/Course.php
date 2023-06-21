<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table ='courses';

    public function students(){
        return $this->belongsToMany(Student::class,'student_courses');
    }
    public function trainers(){
        return $this->belongsToMany(Trainer::class,'trainer_courses');
    }
    public function modules(){
        return $this->belongsToMany(CoursesModule::class,'courses_modules');
    }
}
