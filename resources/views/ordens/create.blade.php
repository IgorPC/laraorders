@extends('layouts.layout')

@section('titulo')
    Nova Ordem
@endsection

@section('conteudo')
    <h1 class="titulo">Nova Ordem</h1>
    <hr>
    <form method="POST" action="{{route('admin.ordens.store')}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="clienteSelect">Cliente: </label>
                    <select name="cliente_id" class="form-control" id="clienteSelect">
                        @foreach($clientes as $cliente)
                            @if($cliente->status != 2) <option value="{{$cliente->id}}">{{$cliente->nome}}</option> @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="servicoSelect">Serviço: </label>
                    <select name="servico_id" class="form-control" id="servicoSelect">
                        @foreach($servicos as $servico)
                            <option value="{{$servico->id}}">{{$servico->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Observações: </label>
            <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" id="exampleFormControlTextarea1" rows="5"></textarea>
            @error('observacoes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-especial">Cadastrar</button>
    </form>
@endsection
