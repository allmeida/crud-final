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
    <script> console.log('Hi!'); </script>
@stop