<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'call_type',
        'date',
        'time_slot',
        'timezone',
        'name',
        'email',
        'phone',
        'company',
        'topic',
        'notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }
}
