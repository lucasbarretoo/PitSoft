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
                    {{ __('Editar Cadastro de Pessoa') }}
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
                                <span class="breadcrumb__point" aria-current="page">Editar Pessoa</span>
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
                    <div class="container">
                        @include ('partials.messages') 
                        <form action="{{route('pessoa.atualizar', $pessoa->IDPESSOA)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <h2 class="heading">Dados do Pessoa</h2>
                                <div class="controls {$errors->has('pessoa_nome') ? 'has-error' : ''}}">
                                    <input type="text" id="pessoa_nome" class="floatLabel" value="{{$pessoa->NOME}}" name="pessoa_nome">
                                    <label for="pessoa_nome">Nome</label>
                                    @if($errors->has('pessoa_nome'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('pessoa_nome')}}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="controls {$errors->has('pessoa_email') ? 'has-error' : ''}}">
                                    <input type="text" id="pessoa_email" class="floatLabel" value="{{$pessoa->EMAIL}}" name="pessoa_email">
                                    <label for="pessoa_email">E-mail</label>
                                    @if($errors->has('pessoa_email'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('pessoa_email')}}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="controls {$errors->has('pessoa_endereco') ? 'has-error' : ''}}">
                                    <input type="text" id="pessoa_endereco" class="floatLabel" value="{{$pessoa->ENDERECO}}" name="pessoa_endereco">
                                    <label for="pessoa_endereco">Endereço</label>
                                    @if($errors->has('pessoa_endereco'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('pessoa_endereco')}}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="grid">
                                    <div class="col-1-3">
                                        <div class="controls {$errors->has('pessoa_cidade') ? 'has-error' : ''}}">
                                            <input type="text" id="pessoa_cidade" class="floatLabel" value="{{$pessoa->CIDADE}}" name="pessoa_cidade">
                                            <label for="pessoa_cidade">Cidade</label>
                                            @if($errors->has('pessoa_cidade'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('pessoa_cidade')}}</strong>
                                                </span>
                                            @endif
                                        </div>          
                                    </div>
                                    <div class="col-1-3">
                                        <div class="controls {$errors->has('pessoa_estado') ? 'has-error' : ''}}">
                                            <input type="text" id="pessoa_estado" class="floatLabel" value="{{$pessoa->ESTADO}}" name="pessoa_estado">
                                            <label for="pessoa_estado">Estado</label>
                                            @if($errors->has('pessoa_estado'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('pessoa_estado')}}</strong>
                                                </span>
                                            @endif
                                        </div>          
                                    </div>
                                    <div class="col-1-3">
                                        <div class="controls {$errors->has('pessoa_cep') ? 'has-error' : ''}}">
                                            <input type="text" id="pessoa_cep" class="floatLabel" value="{{$pessoa->CEP}}" name="pessoa_cep">
                                            <label for="pessoa_cep">CEP</label>
                                            @if($errors->has('pessoa_cep'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('pessoa_cep')}}</strong>
                                                </span>
                                            @endif
                                        </div>          
                                    </div>
                                </div>
                                <div class="controls {$errors->has('pessoa_pais') ? 'has-error' : ''}}">
                                    <i class="fa fa-sort"></i>
                                    <select id="pessoa_pais" class="floatLabel" value="{{$pessoa->PAIS}}" name="pessoa_pais">
                                        <option selected="blank"></option>
                                        <option>Brasil</option>
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                    <label for="pessoa_pais">&nbsp;&nbsp;País</label>
                                    @if($errors->has('pessoa_pais'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('pessoa_pais')}}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <div class="grid">
                                    @foreach($pessoa->telefones as $telefone)
                                        <div class="col-1-2">
                                            <div class="controls {$errors->has('pessoa_telefone') ? 'has-error' : ''}}">
                                                <input type="tel" id="pessoa_telefone" value="{{$telefone->TELEFONE}}" class="floatLabel" name="pessoa_telefone">
                                                <label for="pessoa_telefone">Telefone</label>
                                                @if($errors->has('pessoa_telefone'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('pessoa_telefone')}}</strong>
                                                    </span>
                                                @endif
                                            </div>         
                                        </div>
                                        <div class="col-1-2">
                                            <div class="controls {$errors->has('pessoa_telefone_descricao') ? 'has-error' : ''}}">
                                                <input type="text" id="pessoa_telefone_descricao" value="{{$telefone->TELEFONE_DESCRICAO}}" class="floatLabel" name="pessoa_telefone_descricao">
                                                <label for="pessoa_telefone_descricao">Descrição Telefone</label>
                                                @if($errors->has('pessoa_telefone_descricao'))
                                                    <!-- <span class="help-block"> -->
                                                        <strong class="help-block">{{$errors->first('pessoa_telefone_descricao')}}</strong>
                                                    <!-- </span> -->
                                                @endif
                                            </div>         
                                        </div>
                                        <!-- <input value="Salvar" type="submit" class=" col-1-4"> -->
                                        @break
                                    @endforeach
                                    <div class="grid">
                                        <a href="{{route('pessoa.index')}}">
                                            <button type="button" class="col-1-2" >Voltar</button>
                                        </a>
                                        <button type="submit" value="Submit" class="col-1-2">Salvar</button>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('js')
    <script src="asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{asset('js/app.js') }}" defer></script>
    <script> console.log('Hi!'); </script>
@stop
