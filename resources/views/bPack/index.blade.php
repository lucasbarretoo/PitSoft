@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - Pacotes de formulários')

@section('content_header')
<style>

</style>
@stop

@section('content')
@php
    $aHistoricoNavegacao = [
        ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
        ['route' => '', 'name' => 'bPack', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Pacotes de formulários', $aHistoricoNavegacao);
    Form::bBeginForm('', route('home'), $returnPrint = null);
        Form::bTable($aDataTable);
    Form::bEndForm(route('home'), 'Incluir Registro');
@endphp
@stop
