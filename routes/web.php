<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home/home');
})->middleware(['auth']);

Route::get('/home', function () {
    return view('home/home');
})->middleware(['auth'])->name('home');



/**
 * Rotas Pessoa
 */
Route::get('/listagemPessoas', [PessoaController::class,'index'])->name('pessoa.index')->middleware('auth');

Route::get('/pessoa/cadastrar', [PessoaController::class,'cadastrar'])->name('pessoa.cadastrar')->middleware('auth');

Route::post('/pessoa/salvar', [PessoaController::class,'salvar'])->name('pessoa.salvar')->middleware('auth');

Route::put('/pessoa/atualizar/{IDPESSOA}', [PessoaController::class,'atualizar'])->name('pessoa.atualizar')->middleware('auth');

Route::get('/pessoa/editar/{IDPESSOA}', [PessoaController::class,'editar'])->name('pessoa.editar')->middleware('auth');

Route::get('/pessoa/deletar/{IDPESSOA}', [PessoaController::class,'deletar'])->name('pessoa.deletar')->middleware('auth');

Route::get('/pessoa/detalhar/{IDPESSOA}', [PessoaController::class, 'detalhe'])->name('pessoa.detalhe')->middleware('auth');



require __DIR__.'/auth.php';

// Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/sidebar', function () {
//     return view('sidebar/sidebar');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
