<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Telefone;
use Facade\FlareClient\Http\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests\PessoaRequest;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller{
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $aDadosPessoas =  DB::table('pessoas')
                        ->orderBy('nmpessoa')->paginate(10);
        //  dd($bPack);

        $aDataTable = [];
        $aDataTable['title'] = 'Lista de pacotes';
        $aDataTable['header'] = [
            'Codigo',
            'Nome',
            'Email',
            'Endereco',
            'Pais',
            'Estado',
            'Cidade',
            'Cep',
            'Ações',
        ];
        foreach ($aDadosPessoas as $pessoa) {
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->idpessoa;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->nmpessoa;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->email;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->endereco;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->pais;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->estado;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->cidade;
            $aDataTable['data'][$pessoa->idpessoa][] = $pessoa->cep;
            $aDataTable['data'][$pessoa->idpessoa][] = 'Editar';
        }
        return view('pessoa.index', compact('aDataTable'));

    }
    
    /**
     * Method cadastrar
     *
     * @return void
     */
    public function cadastrar(){
        return view('pessoa.cadastrar');
    }
    
    /**
     * Method salvar
     *
     * @return void
     */
    public function salvar(PessoaRequest $request){
        // try{
            $pessoa = new Pessoa;
            
            $pessoa->NOME = $request->input('pessoa_nome');
            $pessoa->EMAIL = $request->input('pessoa_email');
            $pessoa->ENDERECO = $request->input('pessoa_endereco');
            $pessoa->CIDADE = $request->input('pessoa_cidade');
            $pessoa->ESTADO = $request->input('pessoa_estado');
            $pessoa->PAIS = $request->input('pessoa_pais'); 
            $pessoa->CEP = $request->input('pessoa_cep');
            $pessoa->save();
            $telefone = new Telefone;
            $telefone->TELEFONE = $request->input('pessoa_telefone');
            $telefone->TELEFONE_DESCRICAO = $request->input('pessoa_telefone_descricao');
            $pessoa->addTelefone($telefone);
            self::message('success', 'Pessoa cadastrado com <b class="capitalize">sucesso!</b>');
        // }catch(\Throwable $th){
        //     echo $th->getMessage();
        //     self::message('warning', '<b class="capitalize">Falha!</b> Não foi possível adicionar pessoa');
        // }
        return redirect()->route('pessoa.cadastrar');
        // return redirect()->route('pessoa.editar');
    }
        
    /**
     * Method atualizar
     *
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function atualizar(PessoaRequest $request, $idPessoa){
        $pessoa = Pessoa::find($idPessoa);
        $pessoa->NOME = $request->input('pessoa_nome');
        $pessoa->EMAIL = $request->input('pessoa_email');
        $pessoa->ENDERECO = $request->input('pessoa_endereco');
        $pessoa->CIDADE = $request->input('pessoa_cidade');
        $pessoa->ESTADO = $request->input('pessoa_estado');
        $pessoa->PAIS = $request->input('pessoa_pais'); 
        $pessoa->CEP = $request->input('pessoa_cep');
        if($pessoa->update()){
            self::message('success', 'Pessoa atualizado com <b class="capitalize">sucesso!</b>');
            return redirect()->route('pessoa.index');
        }else{
            self::message('warning', '<b class="capitalize">Falha!</b> Não foi possível atualizar cadastro de pessoa');
            return view('pessoa.editar', compact('pessoa'));
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id){
        if($pessoa = Pessoa::find($id)){
            return view('pessoa.editar', compact('pessoa'));
        }else{
            self::message('warning', 'Pessoa ainda não cadastrado!');
            return redirect()->route('pessoa.index');
        }
    }
        
    /**
     * Method detalhe
     *
     * @param $id $id id do Pessoa que será detalhado
     *
     * @return void
     */
    public function detalhe($idPessoa){
        if($pessoa = Pessoa::find($idPessoa)){
            return view('pessoa.detalhe', compact('pessoa'));
        }else{
            self::message('warning', 'Pessoa ainda não cadastrado!');
            return redirect()->route('pessoa.index');
        }
    }
    /**
     * Method deletar
     *
     * @param $id $id id do Pessoa que será deletado
     *
     * @return void
     */
    public function deletar($idPessoa){
        $pessoa = Pessoa::find($idPessoa);
        if (!$pessoa->deletarTelefones()) {
            self::message('warning', '<b class="capitalize">Falha!</b> Não foi possível deletar registros de telefone ligados ao pessoa');
        }
        if($pessoa->delete()){
            self::message('success', 'Pessoa deletado com <b class="capitalize">sucesso!</b>');
            return redirect()->route('pessoa.index');
        }else{
            self::message('warning', '<b class="capitalize">Falha!</b> Não foi póssível deletar pessoa');
        }
    }

}
