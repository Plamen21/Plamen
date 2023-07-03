<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'user_id', 'id')->withDefault([
            'role' => 'user',
        ]);
    }
    public function userDetails()
    {
        return $this->hasMany(UserDetails::class);
    }


    public function hasRole($roleName)
    {
        return $this->role->role === $roleName;
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'students_courses', 'course_id', 'user_id');
    }
}
