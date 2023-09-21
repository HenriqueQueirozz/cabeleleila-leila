<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'salao_servicos';
    protected $primaryKey = 'id_serv';

    protected $fillable = [
        'titulo_serv',
        'descricao_serv',
        'valor_serv',
        'imagem_serv',
        'situacao_serv'
    ];
}
