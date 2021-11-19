@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@php
    $aHistoricoNavegacao = [
        ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
        ['route' => route('bform.index'), 'name' => 'Listagem de Pessoas', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Editar Pessoa', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Editar Formulário', $aHistoricoNavegacao);
@endphp
@stop

@section('content')

    @include ('partials.messages')
    @php
        Form::bBeginForm('Dados', route('bform.gravar', $bForm), null, 'post');
            Form::bEditString('Nome', 'nmbform', '4', $bForm->nmbform, false, '', false, '20');
            Form::bEditString('Nome Mostrar', 'nmbform_mostrar', '4', $bForm->nmbform_mostrar, false, '', false, '20');
            Form::bEditString('Pacote Pertencente', 'nmbpack', '4', $bPack->nmbpack, false, '', false, '20');
            $btnExtras = [
                'btnExcluir' => [
                    'route' => route('bform.excluir'),
                    'class' => 'btn btn-outline-danger',
                    'title' => 'Excluir'
                ]
            ];
        Form::bEndForm(route('bform.index'), 'Gravar', $btnExtras);
    @endphp
    
@stop
