@extends('layouts.layout')

@section('titulo')
    Ordens de Serviço
@endsection

@section('conteudo')
    <h1 class="titulo">Ordens de Serviço</h1>
    @include('mensagens.sucesso')
    <hr>
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == 1) filter-nav-active @endif mr-1 mt-2" href="{{route('admin.ordens.show', ['orden' => 1])}}">Lançadas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == 2) filter-nav-active @endif mr-1 mt-2" href="{{route('admin.ordens.show', ['orden' => 2])}}">Abertas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == 4) filter-nav-active @endif mr-1 mt-2" href="{{route('admin.ordens.show', ['orden' => 4])}}">Pausadas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == 3) filter-nav-active @endif mr-1 mt-2" href="{{route('admin.ordens.show', ['orden' => 3])}}">Fechadas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link filter-nav @if($active == "all") filter-nav-active @endif mt-2" href="{{route('admin.ordens.index')}}">Todas</a>
        </li>
    </ul>
@include('layouts.ordens')
    @if($ordens->count() >= 20)
        {{$ordens->links()}}
    @endif
    <script src="{{asset('js/refresh.js')}}"></script>
@endsection
