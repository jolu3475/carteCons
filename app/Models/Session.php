<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperSession
 */
class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'ip_address',
        'user_agent'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userid');
    }

}
