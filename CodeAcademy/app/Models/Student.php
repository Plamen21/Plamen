<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='students';

    public function courses(){
        return $this->belongsToMany(Course::class,'student_courses');
    }
    public function studentDetails(){
        return $this->hasOne(StudentsDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
