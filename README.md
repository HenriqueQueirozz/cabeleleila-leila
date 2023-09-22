<h1 align="center">Cabeleleila Leila Salão de Beleza</h1>

## Sobre o projeto
<p>Projeto de agendamentos on-line, criado como teste prático da @Dsin, a partir da seguinte problemática:</p><br>
<p align="justify">A Leila tem um salão de beleza e para aumentar sua clientela, ela pretende adquirir um programa personalizado para que seus clientes possam fazer seus agendamentos online, já que se optasse por um programa pronto o cliente poderia, no momento da escolha, optar por outro salão.</p>
<p align="justify">Ao consultar seus clientes sobre o que eles gostariam que existisse nesse programa, os mesmos responderam que seria a possibilidade de fazer o agendamento de um ou mais serviços e caso necessário realizar a alteração do mesmo (Permitindo a alteração pelo sistema até 2 dias antes do agendado, caso a data agendada seja menor que 2 dias, a alteração só poderá ser feita por telefone), e uma opção de histórico dos agendamentos realizados em determinado periodo, com a possibilidade de visualização dos detalhes desset agendamentos.</p>
<p align="justify">A Leila ainda gostaria que o sistema ao identificar que existe um agendamento da mesma cliente para a mesma semana, sugira que os serviços sejam agendados na mesma data (data do primeiro agendamento).</p> 
<p align="justify">Como diferencial (opcional) no sistema, a cabeleleila Leila acharia interessante também que o mesmo possuisse opções operacionais e gerenciais para o seu negócio.</p>
<p align="justify">Pensando na parte operacional de seu negócio, a cabeleleila Leila gostaria que ela própria tivesse o acesso para alterar os agendamentos dos clientes, quando acontecer de um cliente ligar para o salão solicitando alguma alteração. Ainda na parte operacional, disponibilizar uma opção para listagem dos agendamentos recebidos, possibilitar a confirmação do agendamento ao cliente e o gerenciamento do status de cada um dos serviços solicitados pelo cliente.</p>
<p align="justify">Na parte gerencial, ela gostaria de ferramentas que possibilitam o acompanhamento de seu negócio, apresentando o desempenho semanal do negócio. Considerando as necessidades da cabeleleila Leila, implemente dentro do tempo estipulado uma solução que o ajude o funcionamento de seu salão."</p>

## Tecnologias utilizadas

Para o projeto, utilizei o framework PHP Laravel, Javascript, Html e Css, fazendo uso também de facilitadores de estilização como bootstrap.

## Clonando o projeto

<strong>Requisitos:</strong> PHP e composer.<br><br>

Primeiramente clone o repositório atual, e rode os seguintes comandos
<strong>composer update</strong><br>
<strong>composer install</strong>(Este comando baixará as dependências do projeto);<br>

Crie uma cópia do arquivo <strong>.env.example</strong>, porém com o nome .env, e configure a conexão SQL, o nome da base de dados é cabeleleilaLeila:
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=cabeleleilaLeila<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br><br>

Em seu gerenciador de banco de dados rode o seguinte comando: <strong>create database cabeleleilaLeila</strong>, para a criação da base de dados utilizada no projeto;<br>
<strong>php artisan migrate:fresh</strong> (Este comando criará todas as tabelas do projeto)<br>
<strong>php artisan serve</strong>(Este comando iniciará o projeto)<br>
