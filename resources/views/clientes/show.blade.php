@extends('layouts.layout')

@section('titulo')
    {{$cliente->nome}}
@endsection

@section('conteudo')
    <h1 class="mb-4">{{$cliente->nome}}</h1>
    <hr>
    <a class="links btn-especial btn btn-outline-dark w-100 mt-2 mb-4" href="{{route('admin.clientes.edit', ['cliente' => $cliente->id])}}"><i class="fas fa-user-edit"></i>  Editar Dados</a>
    <div class="row">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Dados</h2>
                    <div class="mb-4">
                        <p><strong>Email: </strong>{{$cliente->email}}</p>
                        <p><strong>Celular: </strong>{{$cliente->celular}}</p>
                        <p><strong>Endereço: </strong>{{$cliente->rua}}, {{$cliente->numero}}, {{$cliente->bairro}} - {{$cliente->cidade}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="text-center align-middle status-cliente @if($cliente->status == 1) cliente-ativo @else cliente-invativo @endif">
                        @if($cliente->status == 1) ATIVO @else INATIVO @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="text-center">Ordens de Serviço</h3>
    <hr>
    @include('layouts.ordens')
@endsection
