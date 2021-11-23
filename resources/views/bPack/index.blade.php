@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - Pacotes de formulários')

@section('content_header')
    @php
        Form::bHeaderForm($title, $aHistoricoNavegacao);
    @endphp
@stop
@section('content')

    @include ('partials.messages')
    @php
        Form::bBeginForm('', route('bpack.cadastrar'), $returnPrint = null);
            Form::bTable($aDataTable);
        Form::bEndForm(route('home'), 'Incluir Registro');
    @endphp
@stop
