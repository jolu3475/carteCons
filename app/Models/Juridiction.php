<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperJuridiction
 */
class Juridiction extends Model
{
    use HasFactory;

    public $fillable = [
        'repexId',
        'paysId'
    ];

    public function repex(): BelongsTo
    {
        return $this->belongsTo(Repex::class, 'repexId');
    }

    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class, 'paysId');
    }
}
