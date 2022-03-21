<?php

use App\Http\Controllers\PainelAtendimentoController;
use App\Http\Controllers\bFormController;
use App\Http\Controllers\bPackController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\rlt_produtosController;
use App\Http\Controllers\rlt_pessoasController;
use App\Http\Controllers\IngredienteController;
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

Route::middleware(['auth'])->group(function () {

    Route::get('/', [PainelAtendimentoController::class, 'index'])->name('PainelAtendimento.index');
    Route::get('/home', [PainelAtendimentoController::class, 'index'])->name('home');

    /**
     * Rotas bpack Sistema
     */
    Route::prefix('/sistema')->group(function(){

        Route::prefix('/bpack')->group(function(){
            Route::get('/', [bPackController::class,'index'])->name('bpack.index');
            Route::post('/Cadastrar', [bPackController::class,'cadastrar'])->name('bpack.cadastrar');
            Route::post('/Gravar/{idbPack?}', [bPackController::class,'gravar'])->name('bpack.gravar');
            Route::get('/Editar/{idbPack}', [bPackController::class,'editar'])->name('bpack.editar');
            Route::get('/Excluir/{idbPack}', [bPackController::class,'excluir'])->name('bpack.excluir');
        });

        Route::prefix('/bform')->group(function(){
            Route::get('/', [bFormController::class,'index'])->name('bform.index');
            Route::get('/ListagembFormPDF', [bFormController::class,'ListagembFormPDF'])->name('bform.ListagembFormPDF');
            Route::get('/Cadastrar', [bFormController::class,'cadastrar'])->name('bform.cadastrar');
            Route::post('/Gravar/{idbForm?}', [bFormController::class,'gravar'])->name('bform.gravar');
            Route::get('/Editar/{idbForm}', [bFormController::class,'editar'])->name('bform.editar');
            Route::get('/Excluir/{idbForm}', [bFormController::class,'excluir'])->name('bform.excluir');
        });

    });

    /**
     * Rotas Pessoa
     */
    Route::prefix('/cadastros')->group(function(){
        Route::prefix('/Produtos')->group(function(){
            Route::get('/', [ProdutoController::class,'index'])->name('produtos.index');
        });
        Route::prefix('/Pessoas')->group(function(){
            Route::get('/', [PessoaController::class,'index'])->name('pessoas.index');
            Route::get('/cadastrar', [PessoaController::class,'cadastrar'])->name('pessoas.cadastrar');
            Route::post('/salvar', [PessoaController::class,'salvar'])->name('pessoas.salvar');
            Route::put('/atualizar/{IDPESSOA}', [PessoaController::class,'atualizar'])->name('pessoas.atualizar');
            Route::get('/editar/{IDPESSOA}', [PessoaController::class,'editar'])->name('pessoas.editar');
            Route::get('/deletar/{IDPESSOA}', [PessoaController::class,'deletar'])->name('pessoas.deletar');
            Route::get('/detalhar/{IDPESSOA}', [PessoaController::class, 'detalhe'])->name('pessoas.detalhe');
        });
        Route::prefix('/Ingredientes')->group(function(){
            Route::get('/', [IngredienteController::class, 'index'])->name('ingredientes.index');
            Route::get('/Cadastrar', [IngredienteController::class,'cadastrar'])->name('ingredientes.cadastrar');
            Route::get('/Gravar', [IngredienteController::class,'gravar'])->name('ingredientes.gravar');
            Route::get('/Editar', [IngredienteController::class,'cadastrar'])->name('ingredientes.editar');
            Route::get('/Excluir', [IngredienteController::class,'excluir'])->name('ingredientes.excluir');
        });
        Route::prefix('/Relatorios')->group(function(){
            Route::get('/rlt_produtos', [rlt_produtosController::class, 'index'])->name('rlt_produtos.index');
            Route::get('/rlt_pessoas', [rlt_pessoasController::class, 'index'])->name('rlt_pessoas.index');
        });
    });
});

require __DIR__.'/auth.php';

// Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/sidebar', function () {
//     return view('sidebar/sidebar');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
