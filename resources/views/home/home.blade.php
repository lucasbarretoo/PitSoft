@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'PitSoft - Painel de Atendimento')

@section('content_header')
<style>

</style>
@stop

@section('content')
@php
    $aHistoricoNavegacao = [
        ['route' => 'home', 'name' => 'Home', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Painel de Atendimento', $aHistoricoNavegacao);
    Form::bBeginForm('', route('home'), $returnPrint = null, 'Get');
        Form::bBeginRow();
        $aDadosSmalBox = [
            [
                'header'        =>  'Mesa 1',
                'content'       =>  'Quantidade de pedidos : 1',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-info' 
            ],
            [
                'header'        =>  'Mesa 1',
                'content'       =>  'Quantidade de pedidos : 4',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-info' 
            ],
            [
                'header'        =>  'Mesa 2',
                'content'       =>  'Quantidade de pedidos : 2',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-success' 
            ],
            [
                'header'        =>  'Mesa 3',
                'content'       =>  'Quantidade de pedidos : 4',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-warning' 
            ],
            [
                'header'        =>  'Mesa 4',
                'content'       =>  'Quantidade de pedidos : 3',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-danger' 
            ],
            [
                'header'        =>  'Mesa 3',
                'content'       =>  'Quantidade de pedidos : 1',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-warning' 
            ],
            [
                'header'        =>  'Mesa 4',
                'content'       =>  'Quantidade de pedidos : 6',
                'route'         =>  '#',
                'desc_footer'   =>  'Ver Pedidos',
                'icon'          =>  'fas fa-hamburger',
                'background'    =>  'bg-danger' 
            ]
        ];
            Form::bSmallBox($aDadosSmalBox);
        Form::bEndRow();
    Form::bEndForm('', 'Adicionar Mesa');
@endphp
@stop

