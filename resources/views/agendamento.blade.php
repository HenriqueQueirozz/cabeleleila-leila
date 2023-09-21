<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cabeleleila Leila</title>
    </head>
    <body>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('agendamento_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Usuário</label>
            <br>
            <select name="usuario_agendamento" id="usuario_agendamento">
                @if(empty($usuarios))
                    <option value="0">Nenhum usuário cadastrado</option>
                @else
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario['id'] }}">{{ $usuario['nome'] }}</option>
                    @endforeach
                @endif
            </select>
            <br>
            <br>
            <label for="">Data agendamento</label>
            <br>
            <input type="text" name="data_agendamento" value="{{ old('data_agendamento') }}">
            <br>
            <br>
            <label>Serviço</label>
            <br>

            @foreach ($servicos as $servico)
                <input type="checkbox" id="{{ $servico['titulo'] }}" name="servico[]" value="{{ $servico['id'] }}">
                <label for="servico">{{ $servico['titulo'] }}</label><br>

                <input type="radio" id="12h" name="horario{{ $servico['id'] }}" value="12:00:00">
                <label for="12h">12h00</label><br>
                <input type="radio" id="14h" name="horario{{ $servico['id'] }}" value="14:00:00">
                <label for="14h">14h00</label><br>
                <input type="radio" id="16h" name="horario{{ $servico['id'] }}" value="16:00:00">
                <label for="16h">16h00</label><br><br>
            @endforeach

            <input type="submit" value="Cadastrar Agendamento">
        </form>
    </body>
</html>