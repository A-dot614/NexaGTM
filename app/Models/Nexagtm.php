<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nexagtm extends Model
{
    /** @use HasFactory<\Database\Factories\NexagtmFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'industry',
        'plan',
        'status',
        'trial_ends_at',
    ];

    protected function casts(): array
    {
        return [
            'trial_ends_at' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
