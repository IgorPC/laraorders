@extends('layouts.layout')

@section('titulo')
    Clientes
@endsection

@section('conteudo')
    <h1 class="titulo">Meus Clientes</h1>
    @include('mensagens.sucesso')
    <hr>
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == 1) filter-nav-active @endif mr-1 mt-2" href="{{route('admin.clientes.index')}}">Ativos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == 2) filter-nav-active @endif mr-1 mt-2" href="{{route('admin.clientes.inativos')}}">Inativos</a>
        </li>
    </ul>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
        </div>
        <input type="text" id="filtro-cliente" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($clientes->count() != 0)
        <ul id="ul-cliente" class="list-group">
        @foreach($clientes as $cliente)
            <li class="list-group-item list-cliente">
                <a class="links-cliente float-left" href="{{route('admin.clientes.show', ['cliente' => $cliente->id])}}"> {{$cliente->nome}}</a>
                <span class="float-right btn-especial @if($cliente->status == 1) cliente-ativo @else cliente-invativo @endif">
                    @if($cliente->status == 1) ATIVO @else INATIVO @endif</span>
            </li>
        @endforeach
    </ul>
        @if($clientes->count() >= 20)
            {{$clientes->links()}}
        @endif
    @else
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading text-center">Não existem clientes a serem exibidas!</h4>
            <p class="text-center">Cadastre um cliente para que ele seja exibido.</p>
        </div>
    @endif

    <script src="{{asset('js/filtro-clientes.js')}}"></script>
@endsection
