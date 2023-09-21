<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendamentoServico extends Model
{
    use HasFactory;

    protected $table = 'salao_agendamento_servico';
    protected $primaryKey = 'id_agse';

    protected $fillable = [
        'fk_agendamento',
        'fk_servico',
        'horario_agse',
        'status_agse',
        'situacao_agse',
        'dataCancel_agse',
        'dataAgen_agse'
    ];
}
