<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModule extends Model
{
    use HasFactory;
    protected $table='courses_modules';

    public function courses(){
        return $this->belongsToMany(Course::class,'courses_modules');
    }
    public function lecture(){
        return $this->belongsToMany(ModulesLecture::class,'modules_lectures');
    }
}
