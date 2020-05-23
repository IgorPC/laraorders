@extends('layouts.layout')

@section('titulo')
    Cadastrar Cliente
@endsection

@section('conteudo')
    <h1 class="titulo">Cadastrar Cliente</h1>
    <hr>
    <form method="POST" action="{{route('admin.clientes.store')}}">
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
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="celularInput">Celular: </label>
                    <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" id="celularInput">
                    @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="email" class="form-control @error('celular') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="ruaInput">Rua: </label>
                    <input type="text" name="rua" class="form-control @error('rua') is-invalid @enderror" id="ruaInput">
                    @error('rua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="numeroInput">Numero: </label>
                    <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" id="numeroInput">
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="bairroInput">Bairro: </label>
                    <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="bairroInput">
                    @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="cidadeInput">Cidade: </label>
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="cidadeInput">
                    @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-especial">Cadastrar</button>
    </form>
@endsection
