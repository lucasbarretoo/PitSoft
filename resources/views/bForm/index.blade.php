@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - Formulários')

@section('content_header')
    @php
        Form::bHeaderForm($title, $aHistoricoNavegacao);
    @endphp
@stop

@section('content')
    @include ('partials.messages')
    @php
        Form::bBeginForm('', route('bform.cadastrar'), $returnPrint = null, 'Get');
            Form::bTable($aDataTable);
        Form::bEndForm(route('bform.cadastrar'), 'Incluir Registro');
    @endphp
@stop
