<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    /**
     * Get the event that owns the guest.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
