<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'event',
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'ip_address',
        'user_agent',
        'properties',
    ];

    protected function casts(): array
    {
        return [
            'properties' => 'array',
        ];
    }

    /**
     * Record a new activity log entry from the current request/user.
     */
    public static function record(string $logName, string $event, string $description, array $properties = [], ?string $subjectType = null, ?int $subjectId = null): self
    {
        $user = Auth::user();

        return static::create([
            'user_id' => $user?->id,
            'user_name' => $user?->name,
            'user_email' => $user?->email,
            'log_name' => $logName,
            'event' => $event,
            'description' => $description,
            'subject_type' => $subjectType,
            'subject_id' => $subjectId,
            'ip_address' => request()->ip(),
            'user_agent' => substr((string) request()->userAgent(), 0, 500),
            'properties' => $properties ?: null,
        ]);
    }
}