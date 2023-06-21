<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsDetail extends Model
{
    use HasFactory;
    protected $table='students_details';

    public function student(){
        return $this->hasOne(Student::class);
    }
}
