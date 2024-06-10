<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pays extends Model
{
    use HasFactory;

    public function juridictions(): HasOne
    {
        return $this->hasOne(Juridiction::class, 'codePays', 'code');
    }

    public function repexs(): HasOne
    {
        return $this->hasOne(Repex::class, 'codePays', 'code');
    }

    public function carte(): HasOne
    {
        return $this->hasOne(Carte::class, 'codePays', 'code');
    }

}
