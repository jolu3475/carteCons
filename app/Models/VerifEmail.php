<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperVerifEmail
 */
class VerifEmail extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token'];

}
