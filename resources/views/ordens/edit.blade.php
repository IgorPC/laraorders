@extends('layouts.layout')

@section('titulo')
    Atualizar Ordem
@endsection

@section('conteudo')
    <h1 class="titulo">Atualizar Ordem</h1>
    <hr>
    <form method="POST" action="{{route('admin.ordens.update', ['orden' => $ordem->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="clienteSelect">Cliente: </label>
                    <select name="cliente_id" class="form-control" id="clienteSelect">
                        <option selected value="{{$clienteOrdem->id}}">{{$clienteOrdem->nome}}</option>
                        @foreach($clientes as $cliente)
                            @if($cliente->status != 2) <option @if($clienteOrdem->id == $cliente->id) disabled @endif value="{{$cliente->id}}">{{$cliente->nome}}</option> @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="servicoSelect">Serviço: </label>
                    <select name="servico_id" class="form-control" id="servicoSelect">
                        <option selected value="{{$servicoOrdem->id}}">{{$servicoOrdem->nome}}</option>
                        @foreach($servicos as $servico)
                            <option @if($servicoOrdem->id == $servico->id) disabled @endif value="{{$servico->id}}">{{$servico->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Observações: </label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" id="exampleFormControlTextarea1" rows="5">{{$ordem->observacoes}}</textarea>
            @error('observacoes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-especial">Atualizar</button>
    </form>
@endsection
