<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Cadastro de Livros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
  <p>{{ $date }}</p>
  <h1>{{ $title1 }}</h1>
  <p>Relatório baseado em todas as informações do banco de dados, os registros foram agrupado por Autor para evitar duplicidade de registros</p>

  <table class="table table-bordered">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Assunto</th>
      <th scope="col">Autor(es)</th>
      <th scope="col">Editora</th>
      <th scope="col">Edição</th>
      <th scope="col">Ano de Publicação</th>
      <th scope="col">Valor</th>
    </tr>
    @foreach($livros as $livro)
    <tr>
      <td>{{ $livro->id_livro }}</td>
      <td>{{ $livro->titulo }}</td>
      <td>{{ $livro->assunto }}</td>
      <td>{{ $livro->autor }}</td>
      <td>{{ $livro->editora }}</td>
      <td>{{ $livro->edicao }}</td>
      <td>{{ $livro->ano_publicacao }}</td>
      <td>{{ 'R$' . number_format($livro->valor, 2, ',', '.') }}</td>
    </tr>
    @endforeach
  </table>
  <br>
  <br>

  <h1>{{ $title2 }}</h1>

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
  <br>
  <br>

  <h1>{{ $title3 }}</h1>

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
