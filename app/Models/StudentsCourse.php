<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsCourse extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function courses() {
        return $this->belongsTo(Course::class);
    }
}
