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
        Schema::create('salao_usuarios', function (Blueprint $table) {
            $table->id('id_usu');
            $table->string('name_usu');
            $table->string('email_usu')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('perfil_usu');
            $table->string('telefone_usu');
            $table->date('dataNasc_usu');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salao_usuarios');
    }
};
