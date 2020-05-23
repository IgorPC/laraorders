<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicosRequest;
use App\Servicos;
use Illuminate\Http\Request;

class ServicosController extends Controller
{

    private $servico;

    public function __construct(Servicos $servico)
    {
        $this->servico = $servico;
    }

    public function index(Request $request)
    {
        $servicos = $this->servico->paginate(20);
        $sucesso = $request->session()->get('sucesso');
        return view('servicos.index', compact('sucesso', 'servicos'));
    }


    public function create()
    {
        return view('servicos.create');
    }


    public function store(ServicosRequest $request)
    {
        $data = $request->all();

        $this->servico->create([
            'nome' => $data['nome'],
            'descricao' => $data['descricao']
        ]);

        session()->flash('sucesso', 'Serviço cadastrado com sucesso.');
        return redirect()->route('admin.servicos.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $servico = $this->servico->find($id);
        return view('servicos.edit', compact('servico'));
    }


    public function update(ServicosRequest $request, $id)
    {
        $data = $request->all();
        $servico = $this->servico->find($id);

        $servico->update([
            'nome' => $data['nome'],
            'descricao' => $data['descricao']
        ]);

        session()->flash('sucesso', 'Serviço cadastrado com sucesso.');
        return redirect()->route('admin.servicos.index');
    }

    public function destroy($id)
    {
        //
    }
}
