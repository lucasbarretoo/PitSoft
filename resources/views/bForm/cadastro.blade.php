@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@php
    Form::bHeaderForm($title, $aHistoricoNavegacao);
@endphp
@stop

@section('content')

   @include ('partials.messages')
    @php
        Form::bBeginForm('Dados', route('bform.gravar', ['idbForm' => $bForm->idbform]), null, 'post');
            Form::bEditString('Codigo', 'idbform', '4', $bForm->idbform, false, '', true, '10');
            Form::bBeginRow();
                Form::bEditString('Nome', 'nmbform', '4', $bForm->nmbform, true, '', false, '20');
                Form::bEditString('Nome Mostrar', 'nmbform_mostrar', '4', $bForm->nmbform_mostrar, true, '', false, '20');
            Form::bEndRow();
            Form::bEditString('Pacote Pertencente', 'nmbpack', '4', $bPack->nmbpack, true, '', false, '20');
            $btnExtras = [];
            if($bForm->idbform){
                $btnExtras = [
                    'btnExcluir' => [
                        'route' => route('bform.excluir', $bForm->idbform),
                        'class' => 'btn btn-outline-danger',
                        'title' => 'Excluir'
                    ]
                ];
            }
        Form::bEndForm(route('bform.index'), 'Gravar', $btnExtras);
    @endphp
@stop