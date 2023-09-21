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

        <form action="{{ route('user_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Nome de usuário</label>
            <br>
            <input type="text" name="nome_usuario" value="{{ old('nome_usuario') }}">
            <br>
            <br>
            <label for="">Senha</label>
            <br>
            <input type="text" name="senha_usuario" value="{{ old('senha_usuario') }}">
            <br>
            <br>
            <label for="">E-mail</label>
            <br>
            <input type="email" name="email_usuario" value="{{ old('email_usuario') }}">
            <br>
            <br>
            <label for="">Telefone</label>
            <br>
            <input type="text" name="telefone_usuario" value="{{ old('telefone_usuario') }}">
            <br>
            <br>
            <label for="">Data de nascimento</label>
            <br>
            <input type="date" name="dataNasc_usuario" value="{{ old('dataNasc_usuario') }}">

            <input type="submit" value="Cadastrar Serviço">
        </form>
    </body>
</html>