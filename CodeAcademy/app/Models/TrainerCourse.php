<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerCourse extends Model
{
    use HasFactory;
    protected $table='trainer_courses';
    public function trainer(){
        return $this->belongsTo(Trainer::class,'trainer_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
