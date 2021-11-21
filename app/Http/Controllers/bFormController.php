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
    
        $aDadosbForm =  DB::table('bform')
                        ->join('bpack', 'bform.idbpack', 'bpack.idbpack')
                        ->groupBy(['bpack.idbpack','bform.idbform'])
                        ->orderBy('nmbform_mostrar')->get();
                        
        $aDataTable = [];
        $aDataTable['title'] = 'Lista de formulários';
        // $aDataTable['paginate'] = $aDadosbForm;
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
        $title = 'Formulários';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => '', 'name' => 'bForm', 'status'=>'ativo']
        ];
        return view('bForm.index', compact('aDataTable', 'aHistoricoNavegacao', 'title'));
    }

    public function cadastrar(){
        $bForm = new bForm;
        $bPack = new bPack;
        $title = 'Incluir Formulário';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => route('bform.index'), 'name' => 'bForm', 'status'=>'inativo'],
            ['route' => '', 'name' => $title, 'status'=>'ativo']
        ];
        return view('bForm.cadastro', compact('bForm', 'bPack', 'aHistoricoNavegacao', 'title'));
    }

    public function excluir($idbForm){
        try {
            $aHistoricoNavegacao = [
                ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
                ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
                ['route' => route('bform.index'), 'name' => 'bForm', 'status'=>'inativo']
                
            ];
            $bForm = bForm::find($idbForm);
            if ($bForm->delete()) {
                $title = '<b class="capitalize">Registro excluído!</b>';
                $msg = 'Formulário excluído com sucesso!';
                self::message('success',  $msg,  $title);
            }else{
                $title = '<b class="capitalize">Falha ao excluir registro!</b>';
                $msg = 'Não foi possível realizar exclusão do formulário, verifique as relações existentes e tente novamente!';
                self::message('success',  $msg,  $title);
                $bPack = bPack::find($bForm->idbpack);
                $title = 'Editar Formulário';
                $aHistoricoNavegacao[] = ['route' => '', 'name' => $title, 'status'=>'ativo'];
                return view('bForm.cadastro', compact('bForm', 'bPack', 'aHistoricoNavegacao', 'title'));
            }
        } catch (QueryException $e) {
            $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
            self::message('danger', $e->getMessage(),  $title);
        }
        return $this->index();
    }

    public function gravar(Request $request, $idbForm = null){
        try {
            $bPack = bPack::select('*')->where('nmbpack',$request->nmbpack)->get();
            $bPack = $bPack[0];
            // print_rpre($bPack->idbpack); exit;
            if ($bPack) {
                $bForm = $request->idbform ? bForm::find($request->idbform) : new bForm;
                //  dd($request->idbform, $idbForm, $bForm);
                $bForm->idbpack = $bPack->idbpack;
                $bForm->nmbform = $request->nmbform;
                $bForm->nmbform_mostrar = $request->nmbform_mostrar;
                if ($bForm->save()) {
                    $bPack = bPack::find($bForm->idbpack);
                    $title = '<b class="capitalize">Registro concluído!</b>';
                    $msg = 'Formulário ' . ($request->idbform ? 'atualizado' : 'incluído') . ' com sucesso!';
                    self::message('success',  $msg,  $title);
                }else{
                    $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
                    $msg = 'Não foi possível realizar inclusão do formulários, verifique todos os campos e tente novamente.';
                    self::message('danger',  $msg,  $title);
                }          
            }else{
                $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
                $msg = 'Pacote pertencente informado não foi encontrado no sitema';
                self::message('warning',  $msg,  $title);
            }
        } catch (QueryException $e) {
            $title = '<b class="capitalize">Falha ao incluir formulário!</b>';
            self::message('danger', $e->getMessage(),  $title);
        }
        $title =($bForm->idbform ? 'Editar' : 'Incluir') . ' Formulário';
        $aHistoricoNavegacao = [
            ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
            ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
            ['route' => route('bform.index'), 'name' => 'bForm', 'status'=>'inativo'],
            ['route' => '', 'name' => $title, 'status'=>'ativo']
        ];
        return view('bForm.cadastro',compact('bForm', 'bPack', 'aHistoricoNavegacao', 'title'));
    }
}
