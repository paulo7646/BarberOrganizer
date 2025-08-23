<?php

namespace App\Enums;

enum TipoUsuarioEnum: int
{
    case BARBEIRO = 4;
    case ATENDENTE = 3;
    case GERENTE = 2;
    case ADMIN = 1;
}
