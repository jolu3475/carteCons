<?php

namespace App\Models;

use App\Models\Erreur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperCarte
 */
class Carte extends Model
{
    use HasFactory;

    protected $fillable = [
        'captchaId',
        'regularId',
        'numero',
        'dateRemise',
        'dateExpiration',
        'valide',
        'vu'
    ];

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

    public function erreur(): HasMany
    {
        return $this->hasMany(Erreur::class, 'erreurId');
    }

}
