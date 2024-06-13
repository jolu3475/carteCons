<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperNotification
 */
class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'carteId',
        'message',
        'vu'
    ];

    public function carte(): BelongsTo
    {
        return $this->belongsTo(Carte::class, 'carteId');
    }
}
