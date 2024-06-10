<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class captcha extends Model
{
    use HasFactory;

    public function carte(): HasOne
    {
        return $this->hasOne(Carte::class, 'captchaId');
    }

}
