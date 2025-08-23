<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoUsuario extends Model
{
    protected $fillable = ['nome'];

    protected $table = 'tipo_usuarios';

    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
