<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperPays
 */
class Pays extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nom',
        'indicatif'
    ];

    public function juridictions(): HasOne
    {
        return $this->hasOne(Juridiction::class, 'paysId');
    }

    public function repexs(): HasOne
    {
        return $this->hasOne(Repex::class, 'paysId');
    }

    public function carte(): HasOne
    {
        return $this->hasOne(Carte::class, 'paysId');
    }

}
