<?php

namespace App\Models;

use App\Models\User;
use App\Models\Carte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Erreur extends Model
{
    use HasFactory;

    protected $fillable = ['carteId', 'regularId', 'contenu'];

    public function carte(): BelongsTo
    {
        return $this->belongsTo(Carte::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
