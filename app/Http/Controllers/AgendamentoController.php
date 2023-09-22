<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AgendamentoServico;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoServicoController;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function store(Request $request){
        $dados_validados = $request->validate(
            [
                'usuario_agendamento'       => ['required'],
                'data_agendamento'          => ['required'],
                // 'hora_agendamento_servico'  => ['required'],
                // 'servico_id'                => ['required'],
            ],
            [
                'usuario_agendamento.required' => 'É necessário um Usuário para o agendamento.',
                'data_agendamento.required' => 'É necessário informar a data desejada para o agendamento.',
                // 'hora_agendamento_servico.required' => 'É necessário informar a hora desejada para o agendamento.',
                // 'servico_id.required' => 'É necessário informar o servico desejado para o agendamento.'
            ]
        );

        $formulario = $request->all();
        print_r('<pre>');
        print_r($formulario);
        exit;

        $Agendamento = new Agendamento;
        $Agendamento->fk_usuario_agen = $formulario["usuario_agendamento"];
        $Agendamento->data_agen = $formulario["data_agendamento"];

        $Agendamento->save();

        $AgendamentoServico = new AgendamentoServicoController;
        $arrayAgendamentoServico = [
                                    'fk_agendamento' => $Agendamento->id_agen,            
                                    'fk_servico' => $formulario['servico_id'],
                                    'horario_agse' => $formulario['hora_agendamento_servico']
                                    ];
        $AgendamentoServico->store($arrayAgendamentoServico);

        $this->index_listagem();
    }

    public function update(Request $request){
        $dados_validados = $request->validate(
            [
                'id_agendamento'    => ['required']
            ],
            [
                'id_agendamento.required' => 'É necessário informar o agendamento desejado.'
            ]
        );

        $formulario = $request->all();
        $Agendamento = Agendamento::find($formulario["id_agendamento"]);
        $Agendamento->fk_usuario_agen = $formulario["usuario_agendamento"];
        $Agendamento->data_agen = $formulario["data_agendamento"];

        $Agendamento->save();
    }

    public function destroy(Request $request){
        $dados_validados = $request->validate(
            [
                'id_agendamento'    => ['required']
            ],
            [
                'id_agendamento.required' => 'É necessário informar o agendamento desejado.'
            ]
        );

        $formulario = $request->all();
        $Agendamento = Agendamento::find($formulario["id_agendamento"]);

        $Agendamento->delete();
    }

    public function index(){
        $UserController = new UserController;
        $ServicoController = new ServicoController;
        $servicos_disponiveis = $ServicoController->listagemServicos('A');
        $usuarios = $UserController->listagemUsers();

        return view('index', ['servicos' => $servicos_disponiveis, 'usuarios' => $usuarios]);
    }

    public function index_listagem(){
        $AgendamentoServicos = AgendamentoServico::all();

        foreach ($AgendamentoServicos as $AgendamentoServico) {
            $array_usuario = [];
            // $array_usuario['id'] = $Usuario->id_usu;
            // $array_usuario['nome'] = $Usuario->name_usu;
            // $array_usuario['email'] = $Usuario->email_usu;
            // $array_usuario['data_nascimento'] = $Usuario->dataNasc_usu;
            // $array_usuario['telefone'] = $Usuario->telefone_usu;
            // $array_usuario['perfil'] = $Usuario->perfil_usu;

            array_push($array_retorno, $array_usuario);
        }

        return view('listagem_agendamento', []);
    }
}
