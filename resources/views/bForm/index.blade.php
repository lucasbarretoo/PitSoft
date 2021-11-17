@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - Formulários')

@section('content_header')
<style>

</style>
@stop

@section('content')
@php
    $aHistoricoNavegacao = [
        ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
        ['route' => '', 'name' => 'bForm', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Formulários', $aHistoricoNavegacao);
    Form::bBeginForm('', route('bform.cadastrar'), $returnPrint = null, 'Get');
        Form::bTable($aDataTable);
    Form::bEndForm(route('bform.cadastrar'), 'Incluir Registro');
@endphp
@stop
