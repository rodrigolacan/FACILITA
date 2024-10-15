<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('estatisticas', function (Blueprint $table) {
            $table->id('ID'); // Chave primária
            $table->foreignId('id_encurtados') // Chave estrangeira
                  ->constrained('ENCURTADOS', 'id') // Relaciona com a tabela 'ENCURTADOS'
                  ->onDelete('cascade'); // Se o encurtador for deletado, as estatísticas também são deletadas
            $table->unsignedInteger('acessos')->default(0); // Campo de acessos, iniciando em 0
        });
    }

    public function down()
    {
        Schema::dropIfExists('estatisticas');
    }
};
