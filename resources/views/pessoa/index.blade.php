@php
    use App\Models\Sist\Form;
@endphp
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@php
    $aHistoricoNavegacao = [
        ['route' => 'home', 'name' => 'Home', 'status'=>'inativo'],
        ['route' => 'pessoa.index', 'name' => 'Listagem de Pessoas', 'status'=>'ativo']
    ];
    Form::bHeaderForm('Listagem de Pessoas', $aHistoricoNavegacao);
@endphp
@stop


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    @include ('partials.messages')
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container" >
                        <nav class="navbar navbar-light bg-light">
                            <div class="container-fluid">
                                <form class="d-flex">
                                    <input class="form-control me-2" name="buscar" type="search" placeholder="Digite o nome do imóvel" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="">
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Endereco</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Cep</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pessoas as $pessoa)
                                        <tr class=" ">
                                            <th scope="row">{{$pessoa->IDPESSOA}}</th>
                                            <td class="">{{$pessoa->NOME}}</td>
                                            <td class="">{{$pessoa->EMAIL}}</td>
                                            <td class="">{{$pessoa->ENDERECO}}</td>
                                            <td class="">{{$pessoa->PAIS}}</td>
                                            <td class="">{{$pessoa->ESTADO}}</td>
                                            <td class="">{{$pessoa->CIDADE}}</td>
                                            <td class="">{{$pessoa->CEP}}</td>
                                            <td>
                                                <a href="{{route('pessoa.editar', $pessoa->IDPESSOA)}}" class=" ">Editar</a>
                                                <a href="{{route('pessoa.detalhe', $pessoa->IDPESSOA)}}" class=" ">Detalhe</a>
                                                <a href="javascript: (confirm('Deseja deletar pessoa?') ? window.location.href='{{route('pessoa.deletar', $pessoa->IDPESSOA)}}' : console.log('false'))" class="">Deletar</a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="grid">
                            <div class="col-1-3">
                                {{ $pessoas->links() }}
                            </div>
                            <a href="{{route('home')}}">
                                <button type="button" class="col-1-3" >Voltar</button>
                            </a>
                            <a href="{{route('pessoa.cadastrar')}}">
                                <button type="button" class="col-1-3" >Adicionar Pessoa</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

