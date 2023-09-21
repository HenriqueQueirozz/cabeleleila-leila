<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'salao_agendamentos';
    protected $primaryKey = 'id_agen';

    protected $fillable = [
        'fk_usuario_agen',
        'data_agen',
        'situacao_agen'
    ];
}
