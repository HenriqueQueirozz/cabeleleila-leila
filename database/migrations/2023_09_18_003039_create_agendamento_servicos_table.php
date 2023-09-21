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
        Schema::create('salao_agendamento_servico', function (Blueprint $table) {
            $table->id('id_agse');
            $table->bigInteger('fk_agendamento');
            $table->bigInteger('fk_servico');
            $table->time('horario_agse');
            $table->string('status_agse')->default('Não confirmado');
            $table->char('situacao_agse', 1)->default('A');
            $table->date('dataCancel_agse')->nullable();
            $table->date('dataAgen_agse')->default(date('Y-m-d'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salao_agendamento_servico');
    }
};
