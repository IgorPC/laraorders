<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <!--fonts-->
    <script src="https://kit.fontawesome.com/35505cabf9.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2&family=Righteous&display=swap" rel="stylesheet">
    <!--Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a class="navbar-brand" @auth()href="{{route('admin.homepage')}}" @endauth @guest() href="{{route('welcome')}}" @endguest><span class="titulo">Laraorders</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @auth()
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown menu-itens  @if(request()->is('admin/ordens*')) active @endif" href="#" id="navbarDropdown" data-toggle="dropdown">
                    Ordens de serviço
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-center" href="{{route('admin.ordens.show', ['orden' => 1])}}">Painel de Ordens</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="{{route('admin.ordens.create')}}">Cadastrar Ordem</a>
                </div>
            </li>
            <li class="nav-item dropdown @if(request()->is('admin/clientes*')) active @endif">
                <a class="nav-link dropdown menu-itens" href="#" id="navbarDropdown" data-toggle="dropdown">
                    Clientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-center" href="{{route('admin.clientes.index')}}">Meus clientes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="{{route('admin.clientes.create')}}">Cadastrar cliente</a>
                </div>
            </li>
            <li class="nav-item dropdown @if(request()->is('admin/servicos*'))  active @endif">
                <a class="nav-link dropdown menu-itens" href="#" id="navbarDropdown" data-toggle="dropdown">
                    Serviços
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-center" href="{{route('admin.servicos.index')}}">Meus serviços</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="{{route('admin.servicos.create')}}">Cadastrar serviço</a>
                </div>
            </li>
        </ul>
        @auth()
            <button type="button" class="btn btn-outline-dark mr-4" data-toggle="modal" data-target="#ModalUser">
                <i class="far fa-user"></i>
            </button>
        @endauth
        <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout')}}">
            @csrf
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Sair</button>
        </form>
    @endauth
        @guest()
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                    </li>
                </ul>
            </div>
        @endguest
    </div>
</nav>
<div class="container mb-4">
    @yield('conteudo')
</div>
@auth()
<!-- MODAL CLIENTE -->
<div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nome: </strong><span class="float-right">{{auth()->user()->name}}</span></li>
                    <li class="list-group-item"><strong>Email: </strong><span class="float-right">{{auth()->user()->email}}</span></li>
                    <li class="list-group-item"><strong>Celular </strong><span class="float-right">{{auth()->user()->cellphone}}</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endauth
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
