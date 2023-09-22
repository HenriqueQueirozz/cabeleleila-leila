<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servico;
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
                'data_agendamento'          => ['required']
            ],
            [
                'usuario_agendamento.required' => 'É necessário um Usuário para o agendamento.',
                'data_agendamento.required' => 'É necessário informar a data desejada para o agendamento.',
            ]
        );

        $formulario = $request->all();

        $Agendamento = new Agendamento;
        $Agendamento->fk_usuario_agen = $formulario["usuario_agendamento"];
        $Agendamento->data_agen = $formulario["data_agendamento"];

        $Agendamento->save();

        $AgendamentoServico = new AgendamentoServicoController;
        $ServicoController = new ServicoController;
        $servicos_disponiveis = $ServicoController->listagemServicos('A');

        for($i = 0; $i < count($servicos_disponiveis); $i++) {
            if($formulario['horario_escolhido_'.$servicos_disponiveis[$i]['id']]){
                $horario = $formulario['horario_escolhido_'.$servicos_disponiveis[$i]['id']];
                
                switch($horario){
                    case '1':
                        $horario_escolhido = '08:00';
                        break;
                    case '2':
                        $horario_escolhido = '10:00';
                        break;
                    case '3':
                        $horario_escolhido = '12:00';
                        break;
                    case '4':
                        $horario_escolhido = '14:00';
                        break;
                    case '5':
                        $horario_escolhido = '16:00';
                        break;
                    case '6':
                        $horario_escolhido = '1*:00';
                        break;
                }

                $arrayAgendamentoServico = [
                                            'fk_agendamento' => $Agendamento->id_agen,            
                                            'fk_servico' => $servicos_disponiveis[$i]['id'],
                                            'horario_agse' => $horario_escolhido
                                            ];

                $AgendamentoServico->store($arrayAgendamentoServico);
            }
        }

        return $this->index_listagem();
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
        $array_retorno = [];

        foreach ($AgendamentoServicos as $AgendamentoServico) {
            $agendamento = Agendamento::find($AgendamentoServico['fk_agendamento']);
            $servico = Servico::find($AgendamentoServico['fk_servico']);
            $user = User::find($agendamento->fk_usuario_agen);

            $horario = explode('-', $agendamento->data_agen);
            $horario = implode('/',array_reverse($horario));

            $array_listagem = [];
            $array_listagem['nome_usuario'] = $user->name_usu;
            $array_listagem['nome_servico'] = $servico->titulo_serv;
            $array_listagem['dia_agendamento'] = $horario;
            $array_listagem['horario_agendamento'] = $AgendamentoServico['horario_agse'];

            array_push($array_retorno, $array_listagem);
        }

        return view('listagem_agendamento', ['listagem_agendamentos' => $array_retorno]);
    }
}
