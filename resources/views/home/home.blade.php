@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

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
    Form::bBeginForm('', $aRota = ['route'=>'home', 'parametros'=>''], $returnPrint = null);
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


                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-2">
                                <a href="{{route('pessoa.index')}}">
                                    <button type="button" class="btn btn-outline-primary">
                                        Listagem de Pessoas
                                    </button>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="{{route('imovel.index')}}">
                                    <button type="button" class="btn btn-outline-primary">
                                        Listagem de Imóveis
                                    </button>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="{{route('proprietario.index')}}">
                                    <button type="button" class="btn btn-outline-primary">
                                        Listagem de Proprietários
                                    </button>
                                </a>
                            </div>
                        </div>
                </div> --}}

