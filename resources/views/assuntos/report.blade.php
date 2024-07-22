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
        <th scope="col">Assunto</th>
      </tr>
      @foreach($assuntos as $assunto)
      <tr>
        <td>{{ $assunto->id_assunto }}</td>
        <td>{{ $assunto->descricao }}</td>
      </tr>
      @endforeach
    </table>

</body>
</html>
