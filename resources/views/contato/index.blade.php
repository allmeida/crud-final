@extends('adminlte::page')

@section('title', 'Contatos')

@section('content_header')
    @include('flash::message')
<a class="btn btn-primary" href="{{ route('contatos.create') }}">Novo Contato</a>
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lista de Contatos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th style="width: 15px">id</th>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
        @foreach($contatos as $contato)
        <tr>
            <td>{{ $contato->id }}</td>
            <td>{{ $contato->nome }}</td>
            <td>{{ $contato->telefone }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('contatos.edit', $contato->id)}}">Editar</a>
                <a class="btn btn-danger" href="javascript:excluirContato({{ $contato->id }})">Excluir</a>
            </td>
        </tr>
        @endforeach
      </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script>
    function excluirContato(id) {
        bootbox.confirm("Deseja mesmo excluir esse contato?", function(sim) {
            if (sim) {
                //bootbox.alert("Deve excluir o cliente com ID: " + id);
                axios.delete('/contatos/' + id)
                    .then(function (resposta) {
                        window.location.href = "/contatos";
                    })
                    .catch(function (erro) {
                        bootbox.alert("Ocorreu um erro: " + erro);
                    })
            }
        });
    }
</script>
@stop