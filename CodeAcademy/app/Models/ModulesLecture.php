<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesLecture extends Model
{
    use HasFactory;
    protected $table='modules_lectures';

    public function modules(){
        return $this->belongsTo(CoursesModule::class,'module_id');
    }
    public function absences()
    {
        return $this->hasMany(StudentAbsence::class, 'lecture_id');
    }
    public function homework(){
        return $this->hasMany(StudentHomework::class,'lecture_id');
    }
}
