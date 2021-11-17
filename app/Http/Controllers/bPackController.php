<?php

namespace App\Http\Controllers;

use App\Models\Bpack;
use Illuminate\Http\Request;
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
            $aDataTable['data'][$bPack->idbpack][] = $bPack->idbpack;
            $aDataTable['data'][$bPack->idbpack][] = $bPack->nmbpack_mostrar;
            $aDataTable['data'][$bPack->idbpack][] = $bPack->type;
            $aDataTable['data'][$bPack->idbpack][] = 'Editar';
        }
        return view('bPack.index', compact('aDataTable'));
    }

    public function cadastrar(){
        return view('home.home');
        // return view('home', compact('aDataTable'));

    }

    public function excluir(){
        return view('home.home');

    }

    public function gravar(){
        return view('home.home');

    }
}
