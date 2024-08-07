<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperRepex
 */
class Repex extends Model
{
    use HasFactory;

    protected $fillable = [
        'paysId',
        'label',
        'adr',
        'email',
        'site'
    ];

    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class, 'paysId');
    }

    public function juridiction(): HasMany
    {
        return $this->hasMany(Juridiction::class, 'repexId');
    }

}
