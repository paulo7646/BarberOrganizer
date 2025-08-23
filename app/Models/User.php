<?php

namespace App\Models;

use App\Enums\TipoUsuarioEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
        'filial_id',
        'tipo_usuario_id',
        'status_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class, 'filial_id');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'usuario_id');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }


    // ========================
    // PAPÉIS (ROLES)
    // ========================
    public function hasRole(TipoUsuarioEnum $role): bool
    {
        return $this->tipo_usuario_id === $role->value;
    }

    public function isBarbeiro(): bool
    {
        return $this->hasRole(TipoUsuarioEnum::BARBEIRO);
    }

    public function isAtendente(): bool
    {
        return $this->hasRole(TipoUsuarioEnum::ATENDENTE);
    }

    public function isGerente(): bool
    {
        return $this->hasRole(TipoUsuarioEnum::GERENTE);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(TipoUsuarioEnum::ADMIN);
    }
}
