@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@php
    $aHistoricoNavegacao = [
        ['route' => route('home'), 'name' => 'Home', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Sistema', 'status'=>'inativo'],
        ['route' => route('bform.index'), 'name' => 'bForm', 'status'=>'inativo'],
        ['route' => '', 'name' => 'Incluir Formulário', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Incluir Formulário', $aHistoricoNavegacao);
@endphp
@stop

@section('content')

    @include ('partials.messages')
    @php
        Form::bBeginForm('Dados', route('bform.gravar'), null, 'post');
            Form::bEditString('Nome', 'nmbform', '4', '', false, '', false, '20');
            Form::bEditString('Nome Mostrar', 'nmbform_mostrar', '4', '', false, '', false, '20');
            Form::bEditString('Pacote Pertencente', 'nmbpack', '4', '', false, '', false, '20');
        Form::bEndForm(route('bform.index'), 'Gravar');
    @endphp
    
@stop