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
    Form::bHeaderForm('Editar Pessoa', $aHistoricoNavegacao);
@endphp
@stop

@section('content')

    @php
        Form::bBeginForm('Dados', route('bform.gravar'));
        
        Form::bBeginRow();
            Form::bEditString('Nome', 'nmbpack', '4', '', false, '', false, '20');
            Form::bEditString('Nome Mostrar', 'nmbpack_mostrar', '4', '', false, '', false, '20');
            Form::bEditString('Tipo', 'EMAIL', '4', '', false, '', false, '20');
            Form::bEditString('Pacote Pertencente', 'ENDERECO', '4', '', false, '', false, '20');
        Form::bEndRow();

        Form::bEndForm(route('bform.index'), 'Gravar');
    @endphp
    
@stop