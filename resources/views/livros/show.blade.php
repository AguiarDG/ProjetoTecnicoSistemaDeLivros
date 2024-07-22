<x-layout title="">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <span><h3>Visualizar Livro</h3></span>
      <span>
          <a href="{{ route('livros.index') }}" class="btn btn-info mb-2">
              Voltar para Lista
          </a>
      </span>
    </div>

    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">#</dt>
        <dd class="col-sm-9">{{ $livro->id_livro }}</dd>
        <dt class="col-sm-3">Titulo</dt>
        <dd class="col-sm-9">{{ $livro->titulo }}</dd>
        <dt class="col-sm-3">Assunto</dt>
        <dd class="col-sm-9">{{ $livro->assunto }}</dd>
        <dt class="col-sm-3">Autor</dt>
        <dd class="col-sm-9">{{ $livro->autor }}</dd>
        <dt class="col-sm-3">Editora</dt>
        <dd class="col-sm-9">{{ $livro->editora }}</dd>
        <dt class="col-sm-3">Edição</dt>
        <dd class="col-sm-9">{{ $livro->edicao }}</dd>
        <dt class="col-sm-3">Ano de Publicação</dt>
        <dd class="col-sm-9">{{ $livro->ano_publicacao }}</dd>
        <dt class="col-sm-3">Valor</dt>
        <dd class="col-sm-9">{{ 'R$' . number_format($livro->valor, 2, ',', '.') }}</dd>
      </dl>
    </div>
  </div>
</x-layout>
