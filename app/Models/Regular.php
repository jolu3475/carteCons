<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperRegular
 */
class Regular extends Model
{
    use HasFactory;

    protected $fillable = [
        'codePays',
        'nom',
        'prenom',
        'email',
        'dateNais',
        'lieuNais',
        'sitMat',
        'proffession',
        'nbEnf',
        'adr',
        'tel',
        'numPass',
        'expPass',
        'arrExt',
        'img',
        'slug'
    ];

    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class, 'codePays', 'code');
    }

    public function carte(): HasOne
    {
        return $this->hasOne(Carte::class, 'regularId');
    }

}
