<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'craft_id', 'teacher_id', 'title', 'description', 
        'date', 'time', 'max_participants', 'price', 'available_seats'
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
    ];

    public function craft()
    {
        return $this->belongsTo(Craft::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'bookings')
                    ->withTimestamps()
                    ->withPivot('status');
    }

    public function availableSeats()
    {
        return $this->available_seats;
    }

    public function isAvailable()
    {
        return $this->available_seats > 0;
    }
}