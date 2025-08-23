<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf',
        'data_nascimento',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'ultimo_acesso',
        'created_by',
        'updated_by',
        'status',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'ultimo_acesso' => 'datetime',
    ];
    protected $dates = [
        'data_nascimento',
        'ultimo_acesso',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_at',
    ];
    protected $appends = [
        'full_address',
    ];
}
