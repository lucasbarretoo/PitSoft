@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@php
    $aHistoricoNavegacao = [
        ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
        ['route' => route('pessoas.index'), 'name' => 'Listagem de Pessoas', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Editar Pessoa', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Editar Pessoa', $aHistoricoNavegacao);
@endphp
@stop

@section('content')

    @php
        Form::bBeginForm('Dados', $aRota);
        
        Form:: bEditString('Nome', 'NOME', '4', $pessoa->nmpessoa, false, '', false, '20');
        Form:: bEditString('Email', 'EMAIL', '4', $pessoa->email, false, '', false, '20');
        Form:: bEditString('Endereço', 'ENDERECO', '4', $pessoa->endereco, false, '', false, '20');
        Form:: bEditString('Nome', 'name', '4', '', false, '', false, '20');

        Form::bEndForm(route('pessoas.index'));
    @endphp
    
@stop