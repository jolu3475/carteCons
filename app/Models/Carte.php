<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carte extends Model
{
    use HasFactory;

    public function captcha(): BelongsTo
    {
        return $this->belongsTo(Captcha::class, 'captchaId');
    }

    public function regular(): BelongsTo
    {
        return $this->belongsTo(Regular::class, 'regularId');
    }

    public function notification(): HasOne
    {
        return $this->hasOne(Notification::class, 'notificationId');
    }

}
