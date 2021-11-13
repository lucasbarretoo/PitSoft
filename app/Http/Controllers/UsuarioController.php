<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pessoa;

class UsuarioController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $buscar = $request['buscar'];
        $idPessoa = $request['IDPESSOA'];
        if($buscar && $idPessoa){
            $pessoas = DB::table('PESSOAS')
                                    ->where('PESSOAS.NOME', 'ilike', '%'.$buscar.'%')
                                    ->select(['*', 'PESSOAS.*'])
                                    ->paginate(5);
                                    return view('usuario.cadastrar', compact('pessoas', 'imovel'));
        }else{
            $proprietarios = DB::table('PROPRIETARIOS')
                                ->leftJoin('PROPRIETARIOS_IMOVEIS', 'PROPRIETARIOS.IDPROPRIETARIO', '=', 'PROPRIETARIOS_IMOVEIS.IDPROPRIETARIO')
                                ->leftJoin('IMOVEIS', 'PROPRIETARIOS_IMOVEIS.IDIMOVEL', '=', 'IMOVEIS.IDIMOVEL')
                                ->leftJoin('PESSOAS', 'PROPRIETARIOS.IDPESSOA', '=', 'PESSOAS.IDPESSOA')
                                ->select(['*', 'PESSOAS.*', 'PROPRIETARIOS.IDPROPRIETARIO'])
                                ->where('PROPRIETARIOS.NMPROPRIETARIO', 'like', '%'.$buscar.'%')
                                ->paginate(10);
            return view('proprietario.index', compact('proprietarios'));
        }
    }
    /**
     * Realiza cadastro de Usuários
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request){
        $buscar = $request['buscar'];
        if($buscar){
            $pessoas = DB::table('PESSOAS')
                                    ->where('NOME', 'like', '%'.$buscar.'%')->paginate(10);
        }else{
            $pessoas = Pessoa::paginate(10);
        }
        return view('usuario.cadastrar', compact('pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
