<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Http\Requests\OrdemServicoRequest;
use App\OrdemServico;
use App\Servicos;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class OrdemServicoController extends Controller
{

    private $ordem;

    public function __construct(OrdemServico $ordem)
    {
        $this->ordem = $ordem;
    }

    public function index(Request $request)
    {
        $ordens = $this->ordem->paginate(20);
        $cliente = Clientes::class;
        $sucesso = $request->session()->get('sucesso');
        $active = "all";
        return view('ordens.index', compact('sucesso', 'ordens', 'cliente', 'active'));
    }

    public function create()
    {
        $clientes = Clientes::all();
        $servicos = Servicos::all();
        return view('ordens.create', compact('clientes', 'servicos'));
    }

    public function store(OrdemServicoRequest $request)
    {
        $data = $request->all();

        $otherData = [
            'status' => 1,
            'user_create' => auth()->user()->id,
            'motivo' => "Aguardando Motivo"
        ];
        $data = array_merge($data, $otherData);

        $user = auth()->user();
        $user->ordemServico()->create([
            'cliente_id' => $data['cliente_id'],
            'servico_id' => $data['servico_id'],
            'status' => $data['status'],
            'user_create' => $data['user_create'],
            'motivo' => $data['motivo'],
            'observacoes' => $data['observacoes']
        ]);

        session()->flash('sucesso', 'A ordem de serviço foi lançada com sucesso.');

        return redirect()->route('admin.ordens.show', ['orden' => 1]);
    }

    public function show(Request $request, $id)
    {
        $ordens = $this->ordem->paginate(15)->where('status', $id);
        $active = $id;
        $sucesso = $request->session()->get('sucesso');
        return view('ordens.index', compact('ordens', 'sucesso', 'active'));
    }

    public function edit($id)
    {
        $ordem = $this->ordem->find($id);
        $clienteOrdem = \App\Clientes::where('id', $ordem->cliente_id)->first();
        $servicoOrdem = Servicos::where('id', $ordem->servico_id)->first();
        $clientes = Clientes::all();
        $servicos = Servicos::all();
        return view('ordens.edit', compact('ordem', 'clienteOrdem', 'servicoOrdem', 'clientes', 'servicos'));
    }

    public function update(OrdemServicoRequest $request, $id)
    {
        $data = $request->all();
        $ordem = $this->ordem->find($id);
        $ordem->update([
            'cliente_id' => $data['cliente_id'],
            'servico_id' => $data['servico_id'],
            'observacoes' => $data['observacoes']
        ]);
        session()->flash('sucesso', 'A ordem de serviço foi atualizada com sucesso.');

        return redirect()->route('admin.ordens.show', ['orden' => 1]);
    }

    public function destroy($id)
    {
        //
    }

    public function abrirOrdem($id)
    {
        $ordem = $this->ordem->find($id);
        $ordem->update([
            'status' => 2,
            'user_open' => auth()->user()->id,
            'data_open' => $horaAtual = new Carbon('now')
        ]);

        session()->flash('sucesso', 'A ordem foi aberta com sucesso com sucesso.');

        return redirect()->route('admin.ordens.show', ['orden' => 2]);
    }

    public function fecharOrdem(OrdemServicoRequest $request, $id)
    {
        $data = $request->get('observacoes');
        $ordem = $this->ordem->find($id);
        $open = new Carbon($ordem->data_open);
        $closed = new Carbon($ordem->data_closed);
        \Illuminate\Support\Carbon::setLocale('pt');
        $espera = $open->diffAsCarbonInterval($ordem->created_at);
        $duracao = $open->diffAsCarbonInterval($closed);

        $ordem->update([
            'status' => 3,
            'user_closed' => auth()->user()->id,
            'data_closed' => $horaAtual = new Carbon('now'),
            'motivo' => $data,
            'espera' => $espera,
            'duracao' => $duracao
        ]);

        session()->flash('sucesso', 'A ordem foi finalizada com sucesso com sucesso.');

        return redirect()->route('admin.ordens.show', ['orden' => 1]);
    }

    public function pausarOrdem(OrdemServicoRequest $request, $id)
    {
        $data = $request->get('observacoes');
        $ordem = $this->ordem->find($id);

        $ordem->update([
            'status' => 4,
            'motivo' => $data
        ]);

        session()->flash('sucesso', 'A ordem foi pausada com sucesso com sucesso.');

        return redirect()->route('admin.ordens.show', ['orden' => 4]);
    }

    public function gerarPDF($id)
    {
        $ordem = $this->ordem->find($id);
        $cliente = Clientes::find($ordem->cliente_id);
        $servico = Servicos::find($ordem->servico_id);
        $user = User::find($ordem->user_closed);
        $html = $this->pdfOrdemServico($ordem, $cliente, $servico, $user);

        $mpdf = new Mpdf();
        $mpdf->SetTitle('Ordem de Serviço');
        $mpdf->Bookmark('Relatorio Ordem de Serviço');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Ordem n'.$ordem->id.'.pdf', "D");
        return redirect()->back();
    }

    public function pdfOrdemServico($ordem, $cliente, $servico, $user){
        $html = "
        <h1>Laraorders</h1>
        <h2>Ordem de serviço Nº {$ordem->id}</h2>
        <hr>
        <h2>Dados do Cliente</h2>
        <h3>{$cliente->nome}</h3>
        <p><strong>Email: </strong> {$cliente->email}</p>
        <p><strong>Celular: </strong> {$cliente->celular}</p>
        <p><strong>Endereço: </strong> {$cliente->rua}, {$cliente->numero}, {$cliente->bairro} - {$cliente->cidade}</p>
        <hr>
        <h3>Descrição do serviço</h3>
        <h5>{$servico->nome}</h5>
        <p><strong>Descrição: </strong> {$ordem->observacoes}</p>
        <hr>
        <h3>Conclusão:</h3>
        <h4>Tecnico: {$user->name}</h4>
        <h5>{$ordem->motivo}</h5>
        <p><strong>Espera: </strong> {$ordem->espera}</p>
        <p><strong>Durção: </strong> {$ordem->duracao}</p>
    ";

        return $html;
    }
}
