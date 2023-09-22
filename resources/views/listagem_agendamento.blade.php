@extends('layouts.app')
@section('title', 'Cabeleleira Leila - Listagem de agendamentos')

@section('content')
<main class="mx-5 d-flex flex-row justify-content-center">
    <section class="w-50">
        <ul class="list-group">
            <h2 class="mb-5">Agendamentos</h2>
            @foreach ($listagem_agendamentos as $agendamento)
                <li class="list-group-item d-flex justify-content-between" >
                    <div>
                        {{ $agendamento['nome_usuario'] }} -
                        <span class="fw-bold">{{ $agendamento['nome_servico'] }}</span>
                    </div>
                    <div>
                        <span class="text-primary">{{ $agendamento['dia_agendamento'] }}</span> | 
                        <span>{{ $agendamento['horario_agendamento'] }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</main>
@endsection