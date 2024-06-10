<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repex extends Model
{
    use HasFactory;

    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class, 'codePays', 'code');
    }

    public function juridiction(): HasOne
    {
        return $this->hasOne(Juridiction::class, 'repexId');
    }

}
