<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="">
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body class="bg-body-tertiary">
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                    <h4 class="ps-4 py-2 text-light">Cabeleleira Leila</h4>
                </a>
            </div>
        </nav>
        <ul class="list-group list-group-horizontal w-100 mb-5 text-center ">
          <a class="container p-0 link-underline link-underline-opacity-0" href="{{ route('index') }}"><li class="list-group-item rounded-0 bg-primary-subtle fw-bold border-3 border-danger-subtle">Início</li></a>
          <a class="container p-0 link-underline link-underline-opacity-0" href="{{ route('servico') }}"><li class="list-group-item rounded-0 bg-primary-subtle fw-bold border-3 border-danger-subtle">Cadastrar serviços</li></a>
          <a class="container p-0 link-underline link-underline-opacity-0" href="{{ route('user') }}"><li class="list-group-item rounded-0 bg-primary-subtle fw-bold border-3 border-danger-subtle">Cadastrar usuários</li></a>
          <a class="container p-0 link-underline link-underline-opacity-0" href="{{ route('listagem_agendamento') }}"><li class="list-group-item rounded-0 bg-primary-subtle fw-bold border-3 border-danger-subtle">Listar agendamentos</li></a>
        </ul>

        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>