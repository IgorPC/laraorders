<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/35505cabf9.js" crossorigin="anonymous"></script>
    <title>Laraorders</title>
</head>
<body>
    <header class="welcome">
        <nav class="menu">
            <ul>
                <li><a class="menu-list" href="#sobreModal" data-toggle="modal" data-target="#sobreModal"><i class="fas fa-chevron-down"></i></a></li>
                <li><a class="menu-list" href="{{route('register')}}" target="_blank">Registrar</a></li>
                <li><a class="menu-list" href="{{route('login')}}" target="_blank">Entrar</a></li>
            </ul>
        </nav>
        <div class="first-window">
            <h1 class="titulo titulo-welcome text-center">LARAORDERS</h1>
        </div>
    </header>

    <!-- MODAL SOBRE O PROJETO -->
    <div class="modal fade" id="sobreModal" tabindex="-1" role="dialog" aria-labelledby="sobreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-contato" id="sobreModalLabel">Sobre o Laraorders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <p>
                       O laraorders foi um projeto totalmente idealizado por mim, e ele simula o funcionamento de um sistema
                       de agendamento de ordens de serviço de uma pequena empresa.
                   </p>
                    <p>
                        Esse sistema foi desenvolvido utilizando Laravel, MySql, Javascript e Bootstrap.
                    </p>
                    <p>
                        Sua principal funcionalidade é permitir que os usuarios cadastrem clientes e serviços, e
                        utilizando esses dados possam agendar ordens para atender esses clientes, com prazos de SLA sinalizados
                        por cores que mudam conforme o tempo que a ordem tenha sido agendada. Quando a ordem for finalizada o
                        usuario pode gerar uma impressão daquela ordem em PDF (Utilizando o mPDF) e entregar ou enviar por
                        email para o cliente.
                    </p>
                    <hr>
                    <p class="text-center modal-contato mb-4">Contato: </p>
                    <div class="row">
                        <div class="col-3">
                            <a href="https://github.com/IgorPC" target="_blank"><p class="text-center"><i class="fab fa-github-square"></i></p></a>
                        </div>
                        <div class="col-3">
                            <a href="https://www.linkedin.com/in/igor-c-9a9969112/" target="_blank"><p class="text-center"><i class="fab fa-linkedin"></i></p></a>
                        </div>
                        <div class="col-3">
                            <a href="https://www.instagram.com/igorpcoutinho/" target="_blank"><p class="text-center"><i class="fab fa-instagram"></i></p></a>
                        </div>
                        <div class="col-3">
                            <a href="https://igorpc.github.io/portfolio/" target="_blank"><p class="text-center"><i class="fas fa-globe"></i></p></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
