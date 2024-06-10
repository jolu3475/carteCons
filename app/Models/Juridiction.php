<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Juridiction extends Model
{
    use HasFactory;

    public function repex(): BelongsTo
    {
        return $this->belongsTo(Repex::class, 'repexId');
    }

    public function pays(): BelongTO
    {
        return $this->belongsTo(Pays::class, 'codePays', 'code');
    }
}
