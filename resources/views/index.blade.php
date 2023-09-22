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
                                {{ $servico['titulo'] }} - <span class="fw-bold">{{ $servico['valor'] }}</span>
                                </button>
                            </h2>
                            <div id="servico_{{ $servico['id'] }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                <p>{{ $servico['descricao'] }}</p>
                                <div class="row p-3 d-flex justify-content-center">
                                    <input type="text" name="horario_escolhido_{{ $servico['id'] }}" id="horario_escolhido_{{ $servico['id'] }}" class="d-none">
                                    <button id="hora_1_{{ $servico['id'] }}" type="button" class="col-2 mx-5 my-2 btn btn-outline-dark horario_{{ $servico['id'] }}" onclick="escolherHorario({{ $servico['id'] }}, 1, event);">8h00</button>
                                    <button id="hora_2_{{ $servico['id'] }}" type="button" class="col-2 mx-5 my-2 btn btn-outline-dark horario_{{ $servico['id'] }}" onclick="escolherHorario({{ $servico['id'] }}, 2, event);">10h00</button>
                                    <button id="hora_3_{{ $servico['id'] }}" type="button" class="col-2 mx-5 my-2 btn btn-outline-dark horario_{{ $servico['id'] }}" onclick="escolherHorario({{ $servico['id'] }}, 3, event);">12h00</button>
                                    <button id="hora_4_{{ $servico['id'] }}" type="button" class="col-2 mx-5 my-2 btn btn-outline-dark horario_{{ $servico['id'] }}" onclick="escolherHorario({{ $servico['id'] }}, 4, event);">14h00</button>
                                    <button id="hora_5_{{ $servico['id'] }}" type="button" class="col-2 mx-5 my-2 btn btn-outline-dark horario_{{ $servico['id'] }}" onclick="escolherHorario({{ $servico['id'] }}, 5, event);">16h00</button>
                                    <button id="hora_6_{{ $servico['id'] }}" type="button" class="col-2 mx-5 my-2 btn btn-outline-dark horario_{{ $servico['id'] }}" onclick="escolherHorario({{ $servico['id'] }}, 6, event);">18h00</button>
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
<script>

    function escolherHorario(id, valor_hora, e){
        var horarioEscolhido = document.getElementById('horario_escolhido_'+id);
        var horarios = document.getElementsByClassName('horario_'+id);
        var hora = document.getElementById('hora_'+valor_hora+'_'+id);

        for(let i = 0; i < horarios.length; i++){
            horarios[i].classList.remove("btn-dark");
            horarios[i].classList.remove("text-light");
            horarios[i].classList.remove("btn-outline-dark");
            horarios[i].classList.add("btn-outline-dark");
        }

        hora.classList.add("btn-dark");
        hora.classList.add("text-light");
        horarioEscolhido.value = valor_hora;
    }
</script>
@endsection