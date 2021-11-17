<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\bForm;
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

    public function gravar(){
        return view('home.home');

    }
}
