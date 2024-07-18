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
        'codePays',
        'label',
        'adr',
        'email'
    ];

    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class, 'codePays', 'code');
    }

    public function juridiction(): HasMany
    {
        return $this->hasMany(Juridiction::class, 'repexId');
    }

}
