<?php

use App\Http\Controllers\PainelAtendimentoController;
use App\Http\Controllers\bFormController;
use App\Http\Controllers\bPackController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\rlt_produtosController;
use App\Http\Controllers\rlt_pessoasController;
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
        Route::get('/bpack', [bPackController::class,'index'])->name('bpack.index');
        Route::get('/bpackCadastrar', [bPackController::class,'cadastrar'])->name('bpack.cadastrar');
        Route::get('/bpackGravar', [bPackController::class,'gravar'])->name('bpack.gravar');
        Route::get('/bform', [bFormController::class,'index'])->name('bform.index');
        Route::get('/bformCadastrar', [bFormController::class,'cadastrar'])->name('bform.cadastrar');
        Route::get('/bformGravar', [bFormController::class,'gravar'])->name('bform.gravar');
    });

    /**
     * Rotas Pessoa
     */
    Route::prefix('/cadastros')->group(function(){
        Route::get('/Produtos', [ProdutoController::class,'index'])->name('produtos.index');
        
        Route::get('/Pessoas', [PessoaController::class,'index'])->name('pessoas.index');
        
        Route::get('/pessoa/cadastrar', [PessoaController::class,'cadastrar'])->name('pessoas.cadastrar');
        
        Route::post('/pessoa/salvar', [PessoaController::class,'salvar'])->name('pessoas.salvar');
        
        Route::put('/pessoa/atualizar/{IDPESSOA}', [PessoaController::class,'atualizar'])->name('pessoas.atualizar');
        
        Route::get('/pessoa/editar/{IDPESSOA}', [PessoaController::class,'editar'])->name('pessoas.editar');
        
        Route::get('/pessoa/deletar/{IDPESSOA}', [PessoaController::class,'deletar'])->name('pessoas.deletar');
        
        Route::get('/pessoa/detalhar/{IDPESSOA}', [PessoaController::class, 'detalhe'])->name('pessoas.detalhe');

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
