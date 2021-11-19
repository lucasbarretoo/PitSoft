<?php

namespace App\Models\Sist;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model{
    use HasFactory;

    /**
     * Abre um formulario
     *
     * @param text/html $caption
     * @param boolean
     */
    static function bBeginForm($caption = '', $Rota = '', $returnPrint = null, $method = 'Post'){
        $form = '';
        // $form .= '<div class="container-fluid">';
        $form .= '    <div class="card card-custom gutter-b example example-compact">';
        if ($caption) {
            $form .= '      <div class="card-header">';
            $form .= '          <h3 class="card-title">'.$caption.'</h3>';
            $form .= '      </div>';
        }
        $form .= '          <form class="form" id="form_validate" enctype="multipart/form-data" method="'.$method.'" action="'.$Rota.'" onsubmit="return inlineCheckForm()">';
        $form .= '          <input type="hidden" name="_token" value="'.csrf_token().'">';
        $form .= '          <div class="card-body">';

		if($returnPrint){
			return $form;
		}else{
			return print_r($form);
		}

    }


     /**
     * fecha um formulario
     *
     * @param boolean
     */
    static function bEndForm($sUrlBtnVoltar = '', $sBtnSubmit = 'Salvar', $aBtnExtra = [], $returnPrint = null){
		
        $form = '';
        $form .='               </div>';
        
        $form .='           <div class="card-footer">';
        $form .='               <div class="row justify-content-md-center">';
        if (!empty($aBtnExtra)) {
            foreach ($aBtnExtra as $btnExtra) {
                $form .='               <a href="'.$btnExtra['route'].'" class="col col-lg-2">';
                $form .='                   <button type="button" class="'.$btnExtra['class'].' col float-right font-weight-bold">'.$btnExtra['title'].'</button>';
                $form .='               </a> ';
            }
        }
        if ($sUrlBtnVoltar) {
            $form .='               <a href="'.$sUrlBtnVoltar.'" class="col col-lg-2">';
            $form .='                   <button type="button" class="btn btn-default col font-weight-bold">Voltar</button>';
            $form .='               </a> ';
        }
        $form .='                   <div class="col col-lg-2">';
        $form .='                       <button type="submit" class="btn btn-primary col font-weight-bold" name="submitButton">'.$sBtnSubmit.'</button>';
        $form .='                   </div>';
        $form .='               </div>';
        $form .='           </div>';
        $form .='         </form>';
        $form .='      </div>';
        // $form .='</div>';

		if($returnPrint){
			return $form;
		}else{
			return print_r($form);
		}
    }

    
    static function bHeaderForm($sHeaderText = '', $aDadosBreadcumbs = [], $returnPrint = null){

        $form ='';
        $form .='<div class="container-fluid">';
        $form .='   <div class="row mb-2">';
        $form .='       <div class="col-sm-6">';
        $form .='           <h1>' .$sHeaderText. '</h1>';
        $form .='       </div>';
        $form .='       <div class="col-sm-6">';
        $form .='           <ol class="breadcrumb float-sm-right">';
        foreach ($aDadosBreadcumbs as $value) {
            if ($value['status'] == 'ativo') {
                $form .='       <li class="breadcrumb-item active">'.$value['name'].'</li>';
            }else{
                $form .='       <li class="breadcrumb-item">';
                $form .='           <a href="'.$value['route'].'">'.$value['name'].'</a>';
                $form .='       </li>';
            }
        }
        $form .='           </ol>';
        $form .='       </div>';
        $form .='   </div>';
        $form .='</div><!-- /.container-fluid -->';
        if($returnPrint){
			return $form;
		}else{
			return print_r($form);
		}
    }
    /**
     * Abre uma linha
     *
     * @param text/html $caption
     * @param boolean
     */
    static function bBeginRow($returnPrint = null)
    {
        $form = '';
        $form .= '<div class="container">';
        $form .= '<div class="form-group row">';

        if($returnPrint){
			return $form;
		}else{
			return print_r($form);
		}
    }

     /**
     * Fecha uma linha
     *
     * @param text/html $caption
     * @param boolean
     */
    static function bEndRow($returnPrint = null)
    {
        $form = '';
        $form .= '</div>';
        $form .= '</div>';

        if($returnPrint){
			return $form;
		}else{
			return print_r($form);
		}
    }

    /**
     * Escreve um campo do tipo string
     *
     * @param text/html $caption
     * @param string $name
     * @param integer $sizeCol largura das colunas bootstrap
     * @param string $value
     * @param boolean $required se o preenchimento é obrigatório
     * @param string $class classe do css do campo
     * @param boolean $readonly se o campo é somente leitura(não pode ser modificado)
     * @param integer $maxlength número máximo de caracteres permitido
     * @param integer $returnPrint 
     * @return text/html
     */
    static function bEditString($caption, $name, $sizeCol, $value = '', $required = false, $class = '', $readonly = false, $maxlength = '', $returnPrint = null)
    {
        $class .=  ' ' . ($required ? ' required' : '');

        $colorLabelRequired = ($required ? ' color-label-required' : '');

        $form = '';
        $form .= '<div class="col-lg-'.$sizeCol.'">';
        $form .= '  <label class="'.$colorLabelRequired.'">'.$caption.'</label>';
        $form .= '  <input type="text" class="form-control '.$class.'" '.$class.' name="'.$name.'" id="'.$name.'"' . ($maxlength ? 'maxlength="' . $maxlength . '"' : '') . 'value="'.$value.'" >' . ($readonly ? 'readonly' : '');
        $form .= '</div>';

        if($returnPrint){
            return $form;
        }else{
            return print_r($form);
        }
    }

    /**
     * bFieldGroup
     * Define um grupo para separação de inputs no formulário
     *
     * @param  mixed $caption é o nome do GRUPO
     * @return void
     */
    static function bFieldGroup($caption){
        $form = '';
        $form .= '<div class="group-header">';
        $form .= '    <h3 class="">'.$caption.'</h3>';
        $form .= '</div>';

        return print_r($form);
    }
    
    /**
     * Method bSmallBox
     *  Escreve small boxes de acordo com o array passado
     *  
     * @param $aDadosSmalBox o parâmetro é um array de
     *  arrays com os dados de cada small box que será apresentada
     * 
     * Ex.: 
     * $aDadosSmalBox = [
     *       [
     *           'header'        =>  'Mesa 1',
     *           'content'       =>  'Quantidade de pedidos : 1',
     *           'route'         =>  '#',
     *           'desc_footer'   =>  'Ver Pedidos',
     *           'icon'          =>  'fas fa-hamburger',
     *           'background'    =>  'bg-info' 
     *       ]];
     *
     * @return void
     */
    static function bSmallBox($aDadosSmalBox = [], $return = false){
        $form = '   <!-- Small boxes (Stat box) -->';    
        $form = '   ';    
        foreach ($aDadosSmalBox as $value) {
            $form .= '<div class="col-lg-4 col-12">';
            $form .= '  <div class="small-box '.$value['background'].'">';
            $form .= '    <div class="inner">';
            $form .= '      <h3>'.$value['header'].'</h3>';
            $form .= '      <p>'.$value['content'].'</p>';
            $form .= '    </div>';
            $form .= '    <div  class="icon">  ';
            $form .= '      <i class="'.$value['icon'].'"></i>';
            $form .= '    </div>';
            $form .= '    <a href="'.$value['route'].'" class="small-box-footer">'.$value['desc_footer'].'  '.'<i class="fas fa-arrow-circle-right"></i></a>';
            $form .= '  </div>';
            $form .= '</div>';
            $form .= '<!-- ./col -->';
        }       

        if ($return) {
            return $form;
        }else{
            return print_r($form);
        }
    }

    static function bTable($aDataTable = []){
        
        $form = '';
        $form .= '<div class="container-fluid">';
        $form .= '  <div class="row">';
        $form .= '      <div class="card col-12">';
        $form .= '          <div class="card-header">';
        $form .= '            <h3 class="card-title">'.$aDataTable['title'].'</h3>';
        $form .= '          </div>';
        $form .= '          <!-- /.card-header -->';
        $form .= '          <div class="card-body">';
        $form .= '            <table class="table table-bordered">';
        $form .= '              <thead>';
        $form .= '                <tr>';
        foreach ($aDataTable['header'] as $value) {
            $form .= '              <th>'.$value.'</th>';
        }
        $form .= '                </tr>';
        $form .= '              </thead>';
        $form .= '              <tbody>';
        foreach ($aDataTable['data'] as $value) {
            $form .= '              <tr>';
            foreach ($value as $lines) {
                $form .= '              <td>'.$lines.'</td>';
            }
        $form .= '                  </tr>';
        }
        $form .= '            </tbody>';
        $form .= '            </table>';
        $form .= '            <div class="card-footer clearfix">';
        $form .= '              <ul class="pagination pagination-sm m-0 float-right">';
        $form .= '                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>';
        $form .= '                  <li class="page-item"><a class="page-link" href="#">1</a></li>';
        $form .= '                  <li class="page-item"><a class="page-link" href="#">2</a></li>';
        $form .= '                  <li class="page-item"><a class="page-link" href="#">3</a></li>';
        $form .= '                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>';
        $form .= '              </ul>';
        $form .= '            </div>';
        $form .= '          </div>';
        $form .= '          <!-- /.card-body -->';
        $form .= '  </div>';
        $form .= '</div>';
        

        print_r($form);
    }
}
