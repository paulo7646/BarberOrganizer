<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'empresas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nome',
    ];

    public function filiais()
    {
        return $this->hasMany(Filial::class);
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
