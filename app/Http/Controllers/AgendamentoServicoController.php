<?php

namespace App\Http\Controllers;

use App\Models\AgendamentoServico;
use Illuminate\Http\Request;

class AgendamentoServicoController extends Controller
{
    public function store($dados){
        $AgendamentoServico = new AgendamentoServico;
        $AgendamentoServico->fk_agendamento     = $dados['fk_agendamento'];
        $AgendamentoServico->fk_servico         = $dados['fk_servico'];
        $AgendamentoServico->horario_agse       = $dados['horario_agse'];
        $AgendamentoServico->dataAgen_agse      = date('Y-m-d');

        $AgendamentoServico->save();
    }

    public function update(Request $request){
        $formulario = $request->all();
        $AgendamentoServico = AgendamentoServico::find();

        $AgendamentoServico->save();
    }

    public function destroy(Request $request){
        $formulario = $request->all();
        $AgendamentoServico = AgendamentoServico::find();

        $AgendamentoServico->delete();
    }
}
