<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModule extends Model
{
    use HasFactory;

    public function courses(){
        return $this->belongsTo(Course::class);
    }
    public function lecture(){
        return $this->hasMany(ModulesLecture::class,'module_id');
    }
    public function absences()
    {
        return $this->hasMany(StudentAbsence::class, 'module_id');
    }
    public function homework(){
        return $this->hasMany(StudentHomework::class,'module_id');
    }
    public function projects(){
        return $this->hasMany(StudentProject::class,'module_id');
    }
}
