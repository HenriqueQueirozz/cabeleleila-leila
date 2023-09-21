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
        Schema::create('salao_agendamentos', function (Blueprint $table) {
            $table->id('id_agen');
            $table->bigInteger('fk_usuario_agen');
            $table->date('data_agen');
            $table->char('situacao_agen', 1)->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salao_agendamentos');
    }
};
