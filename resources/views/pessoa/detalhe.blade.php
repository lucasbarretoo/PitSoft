@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    {{ __('Listagem de Pessoas') }}
                </div>
                <!-- <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div> -->
                <div class="">
                    <nav class="breadcrumb breadcrumb_type5" aria-label="Breadcrumb">
                        <ol class="breadcrumb__list r-list">
                            <li class="breadcrumb__group">
                                <a href="{{route('home')}}" class="breadcrumb__point r-link">Home</a>
                                <span class="breadcrumb__divider" aria-hidden="true">›</span>
                            </li>
                            <li class="breadcrumb__group">
                                <a href="{{route('pessoa.index')}}" class="breadcrumb__point r-link">Listagem de Pessoas</a>
                                <span class="breadcrumb__divider" aria-hidden="true">›</span>
                            </li>
                            <li class="breadcrumb__group">
                                <span class="breadcrumb__point" aria-current="page">Detalhes Pessoa: {{$pessoa->IDPESSOA ? $pessoa->IDPESSOA : $telefone->IDPESSOA }}</span>
                            </li>
                        </ol>
                    </nav>
                </div> 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container" >
                        @include ('partials.messages')
                        <p><b>Pessoa: </b>{{$pessoa->NOME}}</p>
                        <p><b>Email: </b>{{$pessoa->EMAIL}}</p>
                        <p><b>Endereço: </b>{{$pessoa->ENDERECO}}</p>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="">
                                    <th scope="col">#</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pessoa->telefones as $telefone)
                                    <tr class=" ">
                                        <th scope="row">{{$telefone->IDTELEFONE}}</th>
                                        <td class="">{{$telefone->TELEFONE_DESCRICAO}}</td>
                                        <td class="">{{$telefone->TELEFONE}}</td>
                                        <td>
                                            <a href="{{route('telefone.editar', $telefone->IDTELEFONE)}}" class=" ">Editar</a>
                                            <a href="javascript: (confirm('Deseja deletar telefone?') ? window.location.href='{{route('telefone.deletar', $telefone->IDTELEFONE)}}' : console.log('false'))" class="">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="grid">
                            <a href="{{route('pessoa.index')}}">
                                <button type="button" class="col-1-2" >Voltar</button>
                            </a>
                            <a href="{{route('telefone.cadastrar', ['IDPESSOA' => $pessoa->IDPESSOA, 'pessoa_nome' => $pessoa->NOME])}}">
                                <button type="button" class="col-1-2" >Adicionar Telefone</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')]
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script> console.log('Hi!'); </script>
@stop