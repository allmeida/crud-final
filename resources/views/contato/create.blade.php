@extends('adminlte::page')

@section('title', 'Formulario')

@section('content_header')
    @include('flash::message')
<h1>Formulário de Contato</h1>
@stop

@section('content')
<div class="box box-primary">

    <!-- form start -->
    @if(isset($contato))
        <form role="form" action="{{ route('contatos.update', $contato->id) }}" method="POST">
            @method('PUT')    
    @else        
        <form role="form" action="{{ route('contatos.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="nome" class="form-control" id="nome"  name="nome" value="{{$contato->nome ?? null}}" placeholder="informe seu nome">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="telefone" class="form-control" id="telefone" name="telefone" value="{{$contato->telefone ?? null}}" placeholder="Informe seu telefone">
            </div>
            <div class="form-group">
                <label for="cep">Cep</label>
                <input onfocusout="buscaCep()" type="cep" class="form-control" id="cep" name="cep" value="{{$contato->cep ?? null}}" placeholder="Informe seu cep">
            </div>
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="logradouro" class="form-control" id="logradouro" name="logradouro" value="{{$contato->logradouro ?? null}}" placeholder="Informe seu logradouro">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="bairro" class="form-control" id="bairro" name="bairro" value="{{$contato->bairro ?? null}}" placeholder="Informe seu bairro">
            </div>
            <div class="form-group">
                <label for="localidade">Localidade</label>
                <input type="localidade" class="form-control" id="localidade" name="localidade" value="{{$contato->localidade ?? null}}" placeholder="Informe seu localidade">
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="estado" class="form-control" id="estado" name="estado" value="{{$contato->estado ?? null}}" placeholder="Informe seu estado">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function buscaCep() {
            let cep = document.getElementById('cep').value;
            let url = 'https://viacep.com.br/ws/' + cep + '/json/';
            
            axios.get(url)
                .then(function (response) {
                    document.getElementById('logradouro').value = response.data.logradouro
                    document.getElementById('bairro').value = response.data.bairro
                    document.getElementById('localidade').value = response.data.localidade
                    document.getElementById('estado').value = response.data.uf
                })
                .catch(function (error) {
                    alert('Ops! CEP não encontrado');
                })
        }
    </script>
@stop