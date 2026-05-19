<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role', 'photo', 'bio'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function teachingClasses()
    {
        return $this->hasMany(MasterClass::class, 'teacher_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookedClasses()
    {
        return $this->belongsToMany(MasterClass::class, 'bookings')
                    ->withTimestamps()
                    ->withPivot('status');
    }
}