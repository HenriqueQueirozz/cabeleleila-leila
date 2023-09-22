<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store(Request $request){
        $dados_validados = $request->validate(
            [
                'titulo_servico'    => ['required', 'max:50'],
                'valor_servico'     => ['required'],
                'descricao_servico' => ['nullable'],
                'imagem_servico'    => ['nullable'],
            ],
            [
                'titulo_servico.required' => 'É necessário informar um Título para o serviço.',
                'titulo_servico.max' => 'É Título do serviço não pode ultrapassar (50) caracteres.',
                'valor_servico.required' => 'É necessário informar um Valor para o serviço.'
            ]
        );

        $formulario = $request->all();
        if($request->hasFile('imagem_servico') && $request->file('imagem_servico')->isValid()){
            $formulario['imagem_servico'] = $request->imagem_servico;
            $extensao = $formulario['imagem_servico']->extension();
            $nomeImagemHashed = md5($formulario['imagem_servico']->getClientOriginalName().strtotime("now")).".".$extensao;        

            $request->imagem_servico->move(public_path('assets/servicos'), $nomeImagemHashed);
        }else{
            $nomeImagemHashed = null;
        }

        $Servico = new Servico;
        $Servico->titulo_serv       = $formulario['titulo_servico'];
        $Servico->valor_serv        = str_replace(',', '.',str_replace('.', '', $formulario['valor_servico']));
        $Servico->descricao_serv    = $formulario['descricao_servico'];
        $Servico->imagem_serv       = $nomeImagemHashed;
        $Servico->save();

        return view('servico');
    }

    public function update(Request $request){
        $dados_validados = $request->validate(
            [
                'id_servico' => ['required']
            ],
            [
                'id_servico.required' => 'É necessário informar o ID do serviço.'
            ]
        );
        
        $formulario = $request->all();
        $servico = Servico::find($formulario['id_servico']);
        $servico->titulo_serv       = $formulario["titulo_servico"];
        $servico->valor_serv        = $formulario["valor_serv"];
        $servico->descricao_serv    = $formulario["descricao_servico"];
        $servico->imagem_serv       = $formulario["imagem_servico"];
        
        $servico->save();
    }

    public function destroy(Request $request){
        $dados_validados = $request->validate(
            [
                'id_servico' => ['required']
            ],
            [
                'id_servico.required' => 'É necessário informar o ID do serviço.'
            ]
        );
        
        $formulario = $request->all();
        $servico = Servico::find($formulario['id_servico']);
        
        $servico->delete();
    }

    public function listagemServicos($situacao_servico = ''){
        $listar_todos = $situacao_servico == 'Todos' ? true : false;
        $array_retorno = [];
        
        $Servicos = Servico::all();
        foreach ($Servicos as $Servico) {
            $array_servico = [];

            if($situacao_servico == $Servico->situacao_serv || $listar_todos){
                $array_servico['id'] = $Servico->id_serv;
                $array_servico['titulo'] = $Servico->titulo_serv;
                $array_servico['descricao'] = $Servico->descricao_serv;
                $array_servico['valor'] = $Servico->valor_serv;
                $array_servico['imagem'] = $Servico->imagem_serv;
            }
            array_push($array_retorno, $array_servico);
        }

        return $array_retorno;    
    }

    public function index(){
        return view('servico');
    }
}
