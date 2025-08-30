<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->timestamps();
        });


        // insere os status iniciais
        DB::table('status')->insert([
            ['name' => 'Cadastrado', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ativo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Inativo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ag.Modificação', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ag.Aprovação', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancelado', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Excluido', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Liberado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
