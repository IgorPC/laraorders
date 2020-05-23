<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\OrdemServico;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ordens = OrdemServico::all();
        $clientes = Clientes::all();
        return view('homepage', compact('ordens', 'clientes'));
    }
}
