@extends('layouts.layout')

@section('titulo')
    Serviços
@endsection

@section('conteudo')
    <h1 class="titulo">Meus Serviços</h1>
    @include('mensagens.sucesso')
    <hr>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
        </div>
        <input type="text" id="filtro-servicos" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($servicos->count() != 0)
    @foreach($servicos as $key => $servico)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link float-left" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                            <span class="text-simple">{{$servico->nome}}</span>
                        </button>
                        <a class="float-right edit-icon" href="{{route('admin.servicos.edit', ['servico' => $servico->id])}}"><i class="fas fa-edit"></i></a>
                    </h2>
                </div>

                <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <strong>Descrição: </strong>{{$servico->descricao}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        @if($servicos->count() >= 20)
            {{$servicos->links()}}
        @endif
    @else
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading text-center">Não existem serviços a serem exibidas!</h4>
            <p class="text-center">Cadastre um serviço no sistema para que ele seja exibido.</p>
        </div>
    @endif
    <script src="{{asset('js/filtro-servicos.js')}}"></script>
@endsection
