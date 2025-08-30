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
        Schema::create('tipo_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestampswithstatus();
        });

        // insere os tipos de user iniciais
        DB::table('tipo_users')->insert([
            ['name' => 'Admin',  'status_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Funcionario',  'status_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cliente',  'status_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_users');
    }
};
