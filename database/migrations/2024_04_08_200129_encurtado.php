<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encurtados', function (Blueprint $table) {
            $table->id(); // Cria um campo ID auto-incrementável
            $table->text('long_link'); // Coluna para o link longo
            $table->string('short_link', 255); // Coluna para o link curto
            $table->boolean('permanencia')->default(false); // Campo para valores booleanos
            $table->string('usuario')->nullable(); // Adiciona a coluna 'usuario'
            $table->string('hash_link')->nullable(); // Adiciona a coluna 'hash_link'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
