@extends('layouts.layout')

@section('titulo')
    {{$servico->nome}}
@endsection

@section('conteudo')
    <h1 class="titulo">Atualizar Serviço</h1>
    <hr>
    <form method="POST" action="{{route('admin.servicos.update', ['servico' => $servico->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomeInput">Nome: </label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nomeInput" value="{{$servico->nome}}">
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="descricaoInput">Descrição: </label>
            <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricaoInput" value="{{$servico->nome}}">
            @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-especial">Atualizar</button>
    </form>
@endsection
