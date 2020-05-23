<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function (){
    Route::resource('clientes', 'ClientesController');
    Route::get("/inativos", 'ClientesController@clientesInativos')->name('clientes.inativos');
    Route::resource('servicos', 'ServicosController');
    Route::resource('ordens', 'OrdemServicoController');

    Route::get('/ordens/{id}/abrir', 'OrdemServicoController@abrirOrdem')->name('ordens.abrir');
    Route::put('/ordens/{id}/fechar', 'OrdemServicoController@fecharOrdem')->name('ordens.fechar');
    Route::put('/ordens/{id}/pausar', 'OrdemServicoController@pausarOrdem')->name('ordens.pausar');
    Route::get('/ordens/{id}/pdf', 'OrdemServicoController@gerarPDF')->name('ordens.pdf');

    Route::get('/homepage', 'HomeController@index')->name('homepage');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
