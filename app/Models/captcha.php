<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelpercaptcha
 */
class captcha extends Model
{
    use HasFactory;

    protected $fillable = [
        'test',
        'ip_address'
    ];

    public function carte(): HasOne
    {
        return $this->hasOne(Carte::class, 'captchaId');
    }

}
