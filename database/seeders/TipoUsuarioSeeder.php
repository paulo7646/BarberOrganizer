<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = ['barbeiro', 'atendente', 'gerente', 'admin'];
        foreach ($tipos as $tipo) {
            TipoUsuario::updateOrCreate(['nome' => $tipo]);
        }
    }
}
