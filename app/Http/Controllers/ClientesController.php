<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Http\Requests\ClienteRequest;
use App\OrdemServico;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    private $cliente;

    public function __construct(Clientes $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {
        $sucesso = $request->session()->get('sucesso');
        $active = 1;
        $clientes = $this->cliente->paginate(20)->where('status', 1);
        return view('clientes.index', compact('clientes', 'sucesso', 'active'));
    }


    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request)
    {
        $data = $request->all();

        $this->cliente->create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade']
        ]);

        session()->flash('sucesso', 'Cliente cadastrado com sucesso!');
        return redirect()->route('admin.clientes.index');
    }

    public function show($id)
    {
        $cliente = $this->cliente->find($id);
        $ordens = \App\OrdemServico::where('cliente_id', $id)->get();
        return view('clientes.show', compact('cliente', 'ordens'));
    }

    public function edit($id)
    {
        $cliente = $this->cliente->find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = $this->cliente->find($id);
        $data = $request->all();

        $cliente->update([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'status' => $data['status']
        ]);

        session()->flash('sucesso', 'Os dados de '.$cliente->nome.' foram atualizados com sucesso.');
        return redirect()->route('admin.clientes.index');
    }

    public function destroy($id)
    {
        //
    }

    public function clientesInativos(Request $request)
    {
        $clientes = $this->cliente->paginate(6)->where('status', 2);
        $sucesso = $request->session()->get('sucesso');
        $active = 2;
        return view('clientes.index', compact('clientes', 'sucesso', 'active'));
    }
}
