<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Database\QueryException;
use App\Models\bForm;
use App\Models\bPack;
use Illuminate\Http\Request;

class bFormController extends Controller
{
    public function index(){
    
        // dd(bForm::All());
        $aDadosbForm =  bForm::paginate(15);
        // $aDadosbForm =  DB::table('bform')
        //                 ->join('bpack', 'bform.idbpack', 'bpack.idbpack')
        //                 ->groupBy(['bpack.idbpack','bform.idbform'])
        //                 ->orderBy('nmbform_mostrar')->get();
                        
        $aDataTable = [];
        $aDataTable['title'] = 'Lista de formulários';
        $aDataTable['paginate'] = $aDadosbForm;
        $aDataTable['header'] = [
            'Codigo',
            'Nome',
            'Tipo',
            'Pacote Pertencente',
            'Ações'
        ];
        foreach ($aDadosbForm as $bForm) {
            $aDataTable['data'][$bForm->idbform][] = $bForm->idbform;
            $aDataTable['data'][$bForm->idbform][] = $bForm->nmbform_mostrar;
            $aDataTable['data'][$bForm->idbform][] = $bForm->type;
            if (strtoupper(substr($bForm->nmbform, 0, 3)) == 'RLT') {
                $aDataTable['data'][$bForm->idbform][] = $bForm->nmbpack_mostrar . ' - Relatórios';
            }else{
                $aDataTable['data'][$bForm->idbform][] = $bForm->nmbpack_mostrar;
            }
            $aDataTable['data'][$bForm->idbform][] = 'Editar';
        }

        return view('bForm.index', compact('aDataTable'));
    }

    public function cadastrar(){
        return view('bForm.cadastrar');
        // return view('home', compact('aDataTable'));

    }

    public function excluir(){
        return view('home.home');

    }

    public function gravar(Request $request, $idbForm = null){
        try {
            $bPack = bPack::select('idbpack')->where('nmbpack',$request->nmbpack)->get();
            if (count($bPack) == 0) {
                $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
                $msg = 'Pacote pertencente informado não foi encontrado no sitema';
                self::message('warning',  $msg,  $title);
                return view('bForm.cadastrar');
            }
            $bForm = (bForm::find($idbForm) ? bForm::find($idbForm) : new bForm);
            $bForm->idbpack = $bPack[0]->idbpack;
            $bForm->nmbform = $request->nmbform;
            $bForm->nmbform_mostrar = $request->nmbform_mostrar;
            if ($bForm->save()) {
                $bPack = bPack::find($bForm->idbpack);
                $title = '<b class="capitalize">Registro concluído!</b>';
                $msg = 'Formulário incluído com sucesso!';
                self::message('success',  $msg,  $title);
                return view('bForm.editar', compact('bForm', 'bPack'));
            }else{
                $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
                $msg = 'Não foi possível realizar inclusão do formulários, verifique todos os campos e tente novamente.';
                self::message('danger',  $msg,  $title);
                return $idbForm ? view('bForm.editar', compact('bForm')) : view('bForm.cadastrar');
            }          
        } catch (QueryException $e) {
            $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
            self::message('danger', $e->getMessage(),  $title);
            return $idbForm ? view('bForm.editar') : view('bForm.cadastrar');
        }
        // return view('home.home');

    }
}
