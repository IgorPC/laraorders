@extends('layouts.layout')

@section('titulo')
    {{$cliente->nome}}
@endsection

@section('conteudo')
    <h1 class="titulo">Editar Cliente</h1>
    <hr>
    <form method="POST" action="{{route('admin.clientes.update', ['cliente' => $cliente->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label for="nomeInput">Nome: </label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nomeInput" value="{{$cliente->nome}}">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <label class=" mr-2" for="inlineFormCustomSelectPref">Status: </label>
                <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelectPref">
                    @if($cliente->status == 1)
                        <option value="1" selected>ATIVO</option>
                        <option value="2">INATIVO</option>
                    @else
                        <option value="1" >ATIVO</option>
                        <option value="2" selected>INATIVO</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="celularInput">Celular: </label>
                    <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" id="celularInput" value="{{$cliente->celular}}">
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
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$cliente->email}}">
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
                    <input type="text" name="rua" class="form-control @error('rua') is-invalid @enderror" id="ruaInput" value="{{$cliente->rua}}">
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
                    <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" id="numeroInput" value="{{$cliente->numero}}">
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
                    <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="bairroInput" value="{{$cliente->bairro}}">
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
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="cidadeInput" value="{{$cliente->cidade}}">
                    @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-especial">Atualizar Dados</button>
    </form>
@endsection
