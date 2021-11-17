@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - Listagem de Pessoas')

@section('content_header')
<style></style>
@stop


@section('content')
@php
    $aHistoricoNavegacao = [
        ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Listagem de Pessoas', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Listagem de Pessoas', $aHistoricoNavegacao);
    Form::bBeginForm('', $aRota = ['route'=>'home', 'parametros'=>''], $returnPrint = null);
        Form::bTable($aDataTable);
    Form::bEndForm(route('home'), 'Incluir');
@endphp
@stop

