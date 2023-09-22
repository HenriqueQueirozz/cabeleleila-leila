@extends('layouts.app')
@section('title', 'Cabeleleira Leila - Cadastro de serviço')

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
        <h2 class="mb-5">Serviços</h2>
        <form action="{{ route('servico_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titulo_servico" class="form-label">Título do serviço</label>
                <input type="text" class="form-control" id="titulo_servico" name="titulo_servico" value="{{ old('titulo_servico') }}">
            </div>
            <div class="mb-3">
                <label for="descricao_servico" class="form-label">Descrição do serviço</label>
                <textarea class="form-control" placeholder="Descreva um pouco o serviço" id="descricao_servico" style="height: 100px" name="descricao_servico" value="{{ old('descricao_servico') }}"></textarea>
            </div>
            <div class="mb-3">
                <label for="valor_servico" class="form-label">Valor do serviço</label>
                <input type="text" class="form-control" id="valor_servico" name="valor_servico" value="{{ old('valor_servico') }}">
            </div>
           
            <div class="w-100 d-flex justify-content-end mt-5">
                <input class="btn btn-success" type="submit" value="Cadastrar seviço">
            </div>
        </form>
    </section>
</main>
@endsection