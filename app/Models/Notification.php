<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function carte(): BelongsTo
    {
        return $this->belongsTo(Carte::class, 'carteId');
    }
}
