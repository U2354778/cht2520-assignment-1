<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'event_time',
        'location',
        'organizer',
        'capacity',
        'current_attendees',
        'status'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'datetime:H:i',
    ];

    public function getFormattedDateTimeAttribute()
    {
        return $this->event_date->format('l, F j, Y') . ' at ' . $this->event_time;
    }

    public function getAvailabilityAttribute()
    {
        if ($this->capacity == 0) {
            return 'Unlimited';
        }
        return $this->capacity - $this->current_attendees;
    }

    public function getIsFullAttribute()
    {
        return $this->capacity > 0 && $this->current_attendees >= $this->capacity;
    }
}
