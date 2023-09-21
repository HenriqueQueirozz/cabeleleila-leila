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
        Schema::create('salao_servicos', function (Blueprint $table) {
            $table->id('id_serv');
            $table->string('titulo_serv');
            $table->text('descricao_serv')->nullable();
            $table->double('valor_serv', 8, 2);
            $table->string('imagem_serv')->nullable()->default(null);
            $table->char('situacao_serv', 1)->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salao_servicos');
    }
};
