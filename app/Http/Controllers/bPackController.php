<?php

namespace App\Http\Controllers;

use App\Models\Bpack;
use App\Models\Bform;
use App\Models\Sist\Form;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class bPackController extends Controller
{
    public function index(){
        
        $aDadosbPack =  DB::table('bpack')
                    ->whereNotNull('nmbpack_mostrar')
                    ->orderBy('idbpack_pai', 'desc')->get();
        //  dd($bPack);

        $aDataTable = [];
        $aDataTable['title'] = 'Lista de pacotes';
        $aDataTable['header'] = [
            'Codigo',
            'Nome',
            'Tipo',
            'Ações'
        ];
        foreach ($aDadosbPack as $bPack) {
            $aDataTable['data'][$bPack->idbpack]['Codigo'] = $bPack->idbpack;
            $aDataTable['data'][$bPack->idbpack]['Nome'] = $bPack->nmbpack_mostrar;
            $aDataTable['data'][$bPack->idbpack]['Tipo'] = $bPack->type;
            $aDataTable['data'][$bPack->idbpack]['Ações'] = Form::bButtonIcon(['route' => route('bpack.editar', $bPack->idbpack), 'icon' => 'fas fa-edit'], true);
            $aDataTable['data'][$bPack->idbpack]['Ações'] .= Form::bButtonIcon(['route' => route('bpack.excluir', $bPack->idbpack), 'icon' => 'fas fa-trash-alt'], true);
        }
        $title = 'bPack';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => '', 'name' => $title, 'status'=>'ativo']
        ];
        return view('bPack.index', compact('aDataTable', 'title', 'aHistoricoNavegacao'));
    }

    public function cadastrar(){
        $bPack = new bPack;
        $bForm = new bForm;
        $title = 'Incluir Pacote de formulários';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => route('bform.index'), 'name' => 'bPack', 'status'=>'inativo'],
            ['route' => '', 'name' => $title, 'status'=>'ativo']
        ];
        return view('bPack.cadastro', compact('bForm', 'bPack', 'aHistoricoNavegacao', 'title'));

    }

    public function gravar($idbPack = null, Request $request){
        try {
            $bPack = $idbPack ? bPack::find($idbPack) : new bPack;
            $bPack->nmbpack = $request->nmbpack;
            $bPack->nmbpack_mostrar = $request->nmbpack_mostrar;
            $bPack->type = $request->type;
            $bPack->icon = $request->icon;
            if ($bPack->save()) {
                $bPack = bPack::find($bPack->idbpack);
                $title = '<b class="capitalize">Registro concluído!</b>';
                $msg = 'Formulário ' . ($request->idbform ? 'atualizado' : 'incluído') . ' com sucesso!';
                self::message('success',  $msg,  $title);
            }else{
                $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
                $msg = 'Não foi possível realizar inclusão do formulários, verifique todos os campos e tente novamente.';
                self::message('danger',  $msg,  $title);
            }
        } catch (QueryException $e) {
            $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
            self::message('danger', $e->getMessage(),  $title);
        }
        $title =($bPack->idbform ? 'Editar' : 'Incluir') . ' Pacote de Formulários';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => route('bform.index'), 'name' => 'bForm', 'status'=>'inativo'],
            ['route' => '', 'name' => $title, 'status'=>'ativo']
        ];
        return view('bPack.cadastro',compact('bPack', 'aHistoricoNavegacao', 'title'));
    }
    
    public function editar($idbPack){
        $bPack = bPack::find($idbPack);
        $title = 'Editar Pacote de Formulários';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => route('bform.index'), 'name' => 'bForm', 'status'=>'inativo'],
            ['route' => '', 'name' => $title, 'status'=>'ativo']
        ];
        return view('bPack.cadastro', compact('bPack', 'aHistoricoNavegacao', 'title'));
    }

    public function excluir($idbPack){
        try {
            $bPack = bPack::find($idbPack);
            if ($bPack->delete()) {
                $title = '<b class="capitalize">Registro excluído!</b>';
                $msg = 'Formulário excluído com sucesso!';
                self::message('success',  $msg,  $title);
            }else{
                $title = '<b class="capitalize">Falha ao excluir registro!</b>';
                $msg = 'Não foi possível realizar exclusão do formulário, verifique as relações existentes e tente novamente!';
                self::message('warning',  $msg,  $title);
                return $this->editar($bPack->idbpack);
            }
        } catch (QueryException $e) {
            $title = '<b class="capitalize">Falha ao excluir Pacote de Formulários!</b>';
            self::message('danger', $e->getMessage(),  $title);
        }
        return $this->index();
    }

}
