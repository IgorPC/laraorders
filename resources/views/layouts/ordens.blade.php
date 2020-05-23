@if($ordens->count() != 0)
    <ul class="list-group list-group-flush">
        @foreach($ordens as $key => $ordem)
            @php
                $cliente = \App\Clientes::where('id', $ordem->cliente_id)->first();
                $servico = \App\Servicos::where('id', $ordem->servico_id)->first();
                $horaAtual = new \Carbon\Carbon('now');
                $diferenca = $ordem->created_at->diffInMinutes($horaAtual);
            @endphp
            <div class="accordion mb-1" id="accordionExample">
                <div class="card">
                    <div class="card-header"
                         @if($ordem->status == 3) style="background-color: silver"
                         @elseif($diferenca >=0 && $diferenca <= 30) style="background-color: #6ec468"
                         @elseif($diferenca >30 && $diferenca <= 60)  style="background-color:  #c4b966"
                         @elseif($diferenca >60 && $diferenca <= 120)  style="background-color: #c4616b"
                         @elseif($diferenca >121)  style="background-color: #c43f97"
                         @endif
                         id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link float-left" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                <span class="text-simple">{{$cliente->nome}} ({{$servico->nome}})</span>
                            </button>
                            <span class=" float-right status-ordem text-ordem-principal mt-2">
                                @if($ordem->status == 3)
                                    @php $dataClose = $ordem->data_closed @endphp
                                    {{$dataClose = date("d/m/Y")}} |
                                @else
                                    {{$ordem->created_at->locale('pt')->diffForHumans()}} |
                                @endif
                                @if($ordem->status == 1) LANÇADA
                                @elseif($ordem->status == 2) ABERTA
                                @elseif($ordem->status == 3) FECHADA
                                @elseif($ordem->status == 4) PAUSADA
                                @endif
                            </span>
                        </h2>
                    </div>
                    <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body bg-light">
                            @if($ordem->status == 3)
                                <a class="btn btn-outline-danger btn-sm pl-2 float-right float-right" href="{{route('admin.ordens.pdf', ['id' => $ordem->id])}}"><i class="far fa-file-pdf"></i></a>
                            @elseif($ordem->status == 1)
                                <a class="btn btn-outline-dark btn-sm pl-2 float-right" href="{{route('admin.ordens.edit', ['orden' => $ordem->id])}}"><i class="far fa-edit"></i></a>
                            @endif
                            <h5>Dados do cliente</h5>
                            <strong>Email: </strong> {{$cliente->email}}
                            <br>
                            <strong>Celular: </strong> {{$cliente->celular}}
                            <br>
                            <strong>Endereco: </strong> {{$cliente->rua}}, {{$cliente->numero}}, {{$cliente->bairro}} - {{$cliente->cidade}}
                            <br>
                            <hr>
                            <h5>Descrição: </h5>
                            <strong>Serviço: </strong> {{$servico->nome}}
                            <br>
                            {{$ordem->observacoes}}
                                @if($ordem->status != 1)
                                    @php $usuario = \App\User::where('id', $ordem->user_open)->first(); @endphp
                                    <hr>
                                    <strong>Tecnico: </strong> {{$usuario->name}}
                                @endif
                            @if($ordem->status == 3)
                                <hr>
                                <h5 class="text-center">Motivo do Fechamento</h5>
                                {{$ordem->motivo}}
                                <br>
                                <strong>Tempo de Espera: </strong>{{$ordem->espera}}
                                <br>
                                <strong>Tempo de duração: </strong>{{$ordem->duracao}}
                            @endif
                            <hr>
                            @if($ordem->status == 1)
                                <a class="btn btn-dark" href="{{route('admin.ordens.abrir', ['id' => $ordem->id])}}">Abrir Ordem</a>
                            @elseif($ordem->status == 2)
                                <button class="btn btn-dark float-left" data-toggle="modal" data-target="#fecharOrdemModal">Fechar Ordem</button>
                                <button class="btn btn-outline-dark float-right mb-4" data-toggle="modal" data-target="#pausarOrdemModal">Pausar Ordem</button>
                            @elseif($ordem->status == 4)
                                <a class="btn btn-dark float-left" href="{{route('admin.ordens.abrir', ['id' => $ordem->id])}}">Abrir Ordem</a>
                                <button class="btn btn-dark float-right mb-4" data-toggle="modal" data-target="#fecharOrdemModal">Fechar Ordem</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>

    <!--Fechar Ordem Modal -->
    <div class="modal fade" id="fecharOrdemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$cliente->nome}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ordem de serviço Nº <strong>{{$ordem->id}}</strong> </p>
                    <p>Serviço: <strong>{{$servico->nome}}</strong> </p>
                    <hr>
                    <form id="fecharForm" method="POST" action="{{route('admin.ordens.fechar', ['id' => $ordem->id])}}">
                        @csrf
                        @method('PUT')
                        <label for="exampleFormControlTextarea1">Motivo do fechamento: </label>
                        <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('observacoes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary float-right mt-4">Fechar Ordem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Pausar Ordem Modal -->
    <div class="modal fade" id="pausarOrdemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$cliente->nome}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ordem de serviço Nº <strong>{{$ordem->id}}</strong> </p>
                    <p>Serviço: <strong>{{$servico->nome}}</strong> </p>
                    <hr>
                    <form id="fecharForm" method="POST" action="{{route('admin.ordens.pausar', ['id' => $ordem->id])}}">
                        @csrf
                        @method('PUT')
                        <label for="exampleFormControlTextarea1">Motivo da Pausa: </label>
                        <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('observacoes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary float-right mt-4">Pausar Ordem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if($ordens->count() >= 15)
        {{$ordens->links()}}
    @endif
@else
    <div class="alert alert-dark" role="alert">
        <h4 class="alert-heading text-center">Não existem ordens a serem exibidas!</h4>
        <p class="text-center">Aguarde uma ordem ser lançada no sistema.</p>
    </div>
@endif
