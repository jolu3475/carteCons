<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regular extends Model
{
    use HasFactory;

    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class, 'codePays', 'code');
    }

    public function carte(): HasOne
    {
        return $this->hasOne(Carte::class, 'regularId');
    }

}
