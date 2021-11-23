@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - ' . $title)

@section('content_header')
@php
    Form::bHeaderForm($title, $aHistoricoNavegacao);
@endphp
@stop

@section('content')
    @include ('partials.messages')
    @php
        Form::bBeginForm('Dados', route('bpack.gravar', ['idbPack' => $bPack->idbpack]));        
            Form:: bEditString('Codigo', 'idbpack', '4', $bPack->idbpack, false, '', true, '20');
            Form:: bBeginRow();
                Form:: bEditString('Nome', 'nmbpack', '4', $bPack->nmbpack, true, '', false, '20');
                Form:: bEditString('Nome Mostrar', 'nmbpack_mostrar', '4', $bPack->nmbpack_mostrar, true, '', false, '20');
            Form:: bEndRow();
            Form:: bBeginRow();
                Form:: bEditString('Tipo', 'type', '4', $bPack->type, false, '', false, '20');
                Form:: bEditString('Icone', 'icon', '4', $bPack->icon, false, '', false, '20');
            Form:: bEndRow();
            $btnExtras = [];
            if($bPack->idbpack){
                $btnExtras = [
                    'btnExcluir' => [
                        'route' => route('bpack.excluir', $bPack->idbpack),
                        'class' => 'btn btn-outline-danger',
                        'title' => 'Excluir'
                    ]
                ];
            }
        Form::bEndForm(route('bpack.index'), 'Gravar', $btnExtras);
    @endphp
    
@stop