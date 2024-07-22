<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Cadastro de Livros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Relatório baseado em todas as informações do banco de dados</p>

    <table class="table table-bordered">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Autor</th>
      </tr>
      @foreach($autores as $autor)
      <tr>
        <td>{{ $autor->id_autor }}</td>
        <td>{{ $autor->nome }}</td>
      </tr>
      @endforeach
    </table>

</body>
</html>
