@extends('layouts.layout')

@section('titulo')
    Laraorders
@endsection

@section('conteudo')
    <h1 class="titulo text-center">Laraorders</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-home h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Ordens Pendentes</h4>
                    <div class="mb-4 home-principal text-center">
                        {{$ordens->where('status', 1)->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-home h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Total de clientes</h4>
                    <div class="mb-4 home-principal text-center">
                        {{$clientes->count()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card card-home h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Ordens Lançadas</h4>
                    <div class="mb-4 home-principal text-center">
                        {{$ordens->where('status', 1)->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-home h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Ordens Abertas</h4>
                    <div class="mb-4 home-principal text-center">
                        {{$ordens->where('status', 2)->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-home h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Clientes Ativos</h4>
                    <div class="mb-4 home-principal text-center">
                        {{$clientes->where('status', 1)->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-home h-100">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Clientes Inativos</h4>
                    <div class="mb-4 home-principal text-center">
                        {{$clientes->where('status', 2)->count()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
