<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'agendamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'usuario_id',
        'empresa_id',
        'filial_id',
        'cliente',
        'data_hora',
        'status',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}
