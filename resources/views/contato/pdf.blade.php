<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        table {
            width:100%;
            border-collapse: collapse;
        }

        table th {
            background: #5c5c5c;
            color: white;
        }

        table th, td {
            border:1px solid;
            padding: 5px;
        }
    </style>

</head>
<body>
    <h1>Lista de Contatos</h1>
    <hr>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
          </tr>
        </thead>
        <tbody>
        @forelse ($contatos as $contato)
          <tr>
            <td>{{ $contato->id }}</td>
            <td>{{ $contato->nome }}</td>
            <td>{{ $contato->telefone }}</td>
          </tr>
        @empty
          <h2>Sem contatos cadastrados</h2>
        @endforelse
        </tbody>
      </table>

    
        
    
</body>
</html>