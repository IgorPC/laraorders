@extends('layouts.layout')

@section('titulo')
    Cadastrar Serviço
@endsection

@section('conteudo')
    <h1 class="titulo">Cadastrar Serviço</h1>
    <hr>
    <form method="POST" action="{{route('admin.servicos.store')}}">
        @csrf
        <div class="form-group">
            <label for="nomeInput">Nome: </label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nomeInput" value="{{old('nome')}}">
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="descricaoInput">Descrição: </label>
            <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricaoInput" value="{{old('descricao')}}">
            @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-especial">Cadastrar</button>
    </form>
@endsection
