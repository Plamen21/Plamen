<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesLecture extends Model
{
    use HasFactory;
    protected $table='modules_lectures';

    public function modules(){
        return $this->belongsToMany(CoursesModule::class,'courses_modules');
    }
}
