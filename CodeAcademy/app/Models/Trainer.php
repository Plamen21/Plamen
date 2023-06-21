<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table='trainers';

    public function courses(){
        return $this->hasMany(TrainerCourse::class,'trainer_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
