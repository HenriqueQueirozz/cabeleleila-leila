@extends('layouts.app')
@section('title', 'Cabeleleira Leila')

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
        <h2 class="mb-5">Agendamentos</h2>
        <form action="{{ route('agendamento_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="data_agendamento" class="form-label">Usuário</label>
                <select class="form-select" name="usuario_agendamento" id="usuario_agendamento">
                    @if(empty($usuarios))
                        <option>Nenhum usuário cadastrado</option>
                    @else
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario['id'] }}">{{ $usuario['nome'] }}</option>
                        @endforeach
                    @endif
                    
                </select>
            </div>
            <div class="mb-5">
                <label for="data_agendamento" class="form-label">Data agendamento</label>
                <input type="date" class="form-control" id="data_agendamento" name="data_agendamento" value="{{ date('Y-m-d') }}">
            </div>
            <div class="mb-3">
                <label for="servico_agendamento" class="form-label">Serviços</label>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    @foreach ($servicos as $servico)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#servico_{{ $servico['id'] }}" aria-expanded="false" aria-controls="servico_{{ $servico['id'] }}">
                                {{ $servico['titulo'] }}
                                </button>
                            </h2>
                            <div id="servico_{{ $servico['id'] }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                <p>{{ $servico['descricao'] }}</p>
                                <div class="row p-3 d-flex justify-content-center">
                                    <button type="button" class="col-2 mx-5 my-2 btn btn-outline-dark">8h00</button>
                                    <button type="button" class="col-2 mx-5 my-2 btn btn-outline-dark">10h00</button>
                                    <button type="button" class="col-2 mx-5 my-2 btn btn-outline-dark">12h00</button>
                                    <button type="button" class="col-2 mx-5 my-2 btn btn-outline-dark">14h00</button>
                                    <button type="button" class="col-2 mx-5 my-2 btn btn-outline-dark">16h00</button>
                                    <button type="button" class="col-2 mx-5 my-2 btn btn-outline-dark">18h00</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-100 d-flex justify-content-end mt-5">
                <input class="btn btn-success" type="submit" value="Realizar agendamento">
            </div>
        </form>
    </section>
</main>
@endsection