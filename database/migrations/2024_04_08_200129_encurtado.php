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
        Schema::create('ENCURTADOS', function (Blueprint $table) {
            $table->id(); // Cria um campo ID auto-incrementável
            $table->string('short_link', 255);
            $table->text('long_link');
            $table->boolean('permanencia')->default(false); // Campo para valores booleanos
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
