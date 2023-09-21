<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $dados_validados = $request->validate(
            [
                'nome_usuario'      => ['required'],
                'senha_usuario'     => ['required'],
                'email_usuario'     => ['required', 'email'],
                'telefone_usuario'  => ['required'],
                'dataNasc_usuario'  => ['required'],
            ],
            [
                'nome_usuario.required' => 'É necessário informar um Nome para o usuário.',
                'senha_usuario.required' => 'É necessário informar uma Senha para sua conta.',
                'email_usuario.required' => 'É necessário informar um E-mail para sua conta.',
                'telefone_usuario.required' => 'É necessário informar um número de Telefone.',
                'dataNasc_usuario.required' => 'É necessário informar uma Data de Nascimento para o usuário.',
            ]
        );
        
        $formulario = $request->all();
        $User = new User;
        
        $User->perfil_usu   = 'Cliente';
        $User->name_usu     = $formulario['nome_usuario'];
        $User->password     = $formulario['senha_usuario'];
        $User->email_usu    = $formulario['email_usuario'];
        $User->telefone_usu = $formulario['telefone_usuario'];
        $User->dataNasc_usu = $formulario['dataNasc_usuario'];
        
        $User->save();
        Auth::login($User);

    }

    public function update(Request $request){
        $dados_validados = $request->validate(
            [
                'id_usuario'        => ['required'],
                'nome_usuario'      => ['required'],
                'senha_usuario'     => ['required'],
                'email_usuario'     => ['required', 'email'],
                'telefone_usuario'  => ['required'],
                'dataNasc_usuario'  => ['required'],
            ],
            [
                'id_usuario.required' => 'É necessário informar o ID do usuario.',
                'nome_usuario.required' => 'É necessário informar um Nome para o usuário.',
                'senha_usuario.required' => 'É necessário informar uma Senha para sua conta.',
                'email_usuario.required' => 'É necessário informar um E-mail para sua conta.',
                'telefone_usuario.required' => 'É necessário informar um número de Telefone.',
                'dataNasc_usuario.required' => 'É necessário informar uma Data de Nascimento para o usuário.',
            ]
        );

        $formulario = $request->all();
        $user = User::find($formulario['id_usuario']);
        $user->perfil_usu   = $formulario['perfil_usuario'];
        $user->name_usu     = $formulario['nome_usuario'];
        $user->password     = $formulario['senha_usuario'];
        $user->email_usu    = $formulario['email_usuario'];
        $user->telefone_usu = $formulario['telefone_usuario'];
        $user->dataNasc_usu = $formulario['dataNasc_usuario'];
        
        $user->save();
    }

    public function destroy(Request $request){
        $dados_validados = $request->validate(
            [
                'id_usuario' => ['required']
            ],
            [
                'id_usuario.required' => 'É necessário informar o ID do usuario.'
            ]
        );
        
        $formulario = $request->all();
        $user = User::find($formulario['id_servico']);
        
        $user->delete();
    }

    public function listagemUsers(){
        $array_retorno = [];
        
        $Usuarios = User::all();
        foreach ($Usuarios as $Usuario) {
            $array_usuario = [];
            $array_usuario['id'] = $Usuario->id_usu;
            $array_usuario['nome'] = $Usuario->name_usu;
            $array_usuario['email'] = $Usuario->email_usu;
            $array_usuario['data_nascimento'] = $Usuario->dataNasc_usu;
            $array_usuario['telefone'] = $Usuario->telefone_usu;
            $array_usuario['perfil'] = $Usuario->perfil_usu;

            array_push($array_retorno, $array_usuario);
        }

        return $array_retorno;    
    }

    public function index(){
        return view('user');
    }
}
