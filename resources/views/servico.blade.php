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

        <form action="{{ route('servico_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Título serviço</label>
            <br>
            <input type="text" name="titulo_servico" value="{{ old('titulo_servico') }}">
            <br>
            <br>
            <label for="">Descrição serviço</label>
            <br>
            <textarea name="descricao_servico" value="{{ old('descricao_servico') }}"></textarea>
            <br>
            <br>
            <label for="">Valor serviço</label>
            <br>
            <input type="text" name="valor_servico" value="{{ old('valor_servico') }}">
            <br>
            <br>
            <label for="">Imagem serviço</label>
            <br>
            <input type="file" name="imagem_servico" value="{{ old('imagem_servico') }}">
            <br>
            <br>

            <input type="submit" value="Cadastrar Serviço">
        </form>
    </body>
</html>