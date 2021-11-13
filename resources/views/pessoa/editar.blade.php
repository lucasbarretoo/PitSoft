@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@php
    $aHistoricoNavegacao = [
        ['route' => 'home', 'name' => 'Home', 'status'=>'inativo'],
        ['route' => 'pessoa.index', 'name' => 'Listagem de Pessoas', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Editar Pessoa', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Editar Cadastro de Pessoa', $aHistoricoNavegacao);
@endphp
@stop

@section('content')

    @php
        $aRota = ['route' => 'pessoa.atualizar', 'parametros' => [$pessoa->IDPESSOA]];
        Form::bBeginForm('Dados', $aRota);
        
        Form:: bEditString('Nome', 'NOME', '4', $pessoa->NOME, false, '', false, '20');
        Form:: bEditString('Email', 'EMAIL', '4', $pessoa->EMAIL, false, '', false, '20');
        Form:: bEditString('Endereço', 'ENDERECO', '4', $pessoa->ENDERECO, false, '', false, '20');
        Form:: bEditString('Nome', 'name', '4', '', false, '', false, '20');

        Form::bEndForm();
    @endphp
    
@stop
