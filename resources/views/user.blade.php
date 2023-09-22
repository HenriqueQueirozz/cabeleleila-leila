@extends('layouts.app')
@section('title', 'Cabeleleira Leila - Cadastro de usuário')

@section('content')
<main class="mx-5 d-flex flex-row justify-content-center">
    @if ($errors->any())
        <div class="alert alert-danger mb-5 w-75" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <section class="w-50">
        <h2 class="mb-5">Usuários</h2>
        <form action="{{ route('user_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome_usuario" class="form-label">Nome de usuário</label>
                <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" value="{{ old('nome_usuario') }}">
            </div>
            <div class="mb-3">
                <label for="email_usuario" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email_usuario" name="email_usuario" value="{{ old('email_usuario') }}">
            </div>
            <div class="mb-3">
                <label for="dataNasc_usuario" class="form-label">Data de nascimento</label>
                <input type="date" class="form-control" id="dataNasc_usuario" name="dataNasc_usuario" value="2004-01-16">
            </div>
            <div class="mb-3">
                <label for="telefone_usuario" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone_usuario" name="telefone_usuario" value="{{ old('telefone_usuario') }}">
            </div>
           
            <div class="w-100 d-flex justify-content-end mt-5">
                <input class="btn btn-success" type="submit" value="Cadastrar usuário">
            </div>
        </form>
    </section>
</main>
@endsection