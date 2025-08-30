<?php

namespace App\Enums;

enum TipoUsuarioEnum: int
{
    case ADMIN = 1;
    case FUNCIONARIO = 2;
    case CLIENTE = 3;
}

enum StatusEnum: int
{
    case CADASTRADO = 1;
    case ATIVO = 2;
    case INATIVO = 3;
    case AGMODIFICACAO = 4;
    case AGAPROVACAO = 5;
    case CANCELADO = 6;
    case EXCLUIDO = 7;
    case LIBERADO = 8;
}
