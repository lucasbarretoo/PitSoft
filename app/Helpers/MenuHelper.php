<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

function MontaMenu()
{
    /**
     * Realiza a montagem do primeiro nível de menus.
     * O primeiro nível de menus corresponde aos regsitros
     * da tabela bpack
     */
    $aMenu =  DB::table('bpack')
                    ->whereNotNull('nmbpack_mostrar')
                    ->orderBy('idbpack_pai', 'desc')->get();

    foreach($aMenu as $Bpack){
        if ($Bpack->idbpack_pai) {
            $return[$Bpack->idbpack_pai]['submenu'][$Bpack->idbpack] = [     
                'text'          =>  $Bpack->nmbpack_mostrar,
                // 'url'           =>  route($Bpack->nmbpack.'_index'),
                'url'           =>  '#',
                'icon'          =>  $Bpack->icon
            ];
        }else{
            $return[$Bpack->idbpack] = [     
                'text'          =>  $Bpack->nmbpack_mostrar,
                // 'url'           =>  route($Bpack->nmbpack.'_index'),
                'url'           =>  '#',
                'icon'          =>  $Bpack->icon
            ];
        }
    }
    
    /**
     *  Realiza a montagem dos subMenus ou segundo nível de menus.
     * 
     *  O segundo nível de menus corresponde aos regsitros
     * da tabela bform.
     * 
     *  Na última posição da lista de subMenus caso o bpack tenha algum formulário de relatório
     * será apresentado o terceiro nível de menus correspondente aos relatórios daquele 
     * bpack(primeiro nível)
     */
    $aSubMenu =  DB::table('bpack')
                ->join('bform', 'bform.idbpack', 'bpack.idbpack')
                ->whereNotNull('nmbpack_mostrar')
                ->groupBy(['bpack.idbpack','bform.idbform'])
                ->orderBy('nmbpack_mostrar')->get();

    foreach($aSubMenu as $Bform){
        if (strtoupper(substr($Bform->nmbform, 0, 3)) == 'RLT') {
            if(!isset($return[$Bform->idbpack]['submenu']['RLT'])){
                $return[$Bform->idbpack]['submenu']['RLT'] = [
                    'text'      =>  ' - Relatórios',
                    'icon'          =>  '',
                    'submenu'   =>  []
                ];
            }
            $return[$Bform->idbpack]['submenu']['RLT']['submenu'][] = [
                'text'          =>  ' • ' . $Bform->nmbform_mostrar,
                'url'           =>  Route::has($Bform->nmbform.'.index') ? route($Bform->nmbform.'.index') : '#',
                'icon'          =>  ''
            ];
        }else{
            $return[$Bform->idbpack]['submenu'][] = [
                'text'          =>  ' - ' . $Bform->nmbform_mostrar,
                'url'           =>  Route::has($Bform->nmbform.'.index') ? route($Bform->nmbform.'.index') : '#',
                'icon'          =>  ''
            ];
        }
        ksort($return[$Bform->idbpack]['submenu'], SORT_STRING);
    }
    
    return $return;
}
?>