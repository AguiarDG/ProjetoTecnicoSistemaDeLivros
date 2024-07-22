<x-layout title="Novo Livro">
  <form id="form-livro" action="{{ route('livros.save') }}" method="post">
    @csrf
    <div class="mb-3 list-group">
      <div class="list-group-item">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" id="titulo" name="titulo" class="form-control maxlength-40">
        <small id="charCount" class="form-text text-muted">0/40 caracteres</small>
      </div>
      <div class="list-group-item">
        <label for="assunto" class="form-label">Assunto:</label>
        <select name="assunto" id="assunto" class="form-control">
            <option selected>Selecione uma opção</option>
            @foreach($assuntos as $assunto)
              <option value="{{ $assunto->id_assunto }}">{{ $assunto->descricao }}</option>
            @endforeach
          </select>
      </div>
      <div class="list-group-item">
        <label for="autor" class="form-label">Autor:</label>
        <select name="autores[]" id="autor" class="form-control select2" multiple="multiple">
          @foreach($autores as $autor)
            <option value="{{ $autor->id_autor }}">{{ $autor->nome }}</option>
          @endforeach
        </select>
      </div>
      <div class="list-group-item">
        <label for="editora" class="form-label">Editora:</label>
        <input type="text" id="editora" name="editora" class="form-control maxlength-40">
        <small id="charCount" class="form-text text-muted">0/40 caracteres</small>
      </div>
      <div class="list-group-item">
        <label for="edicao" class="form-label">Edição:</label>
        <input type="number" id="edicao" name="edicao" class="form-control">
      </div>
      <div class="list-group-item">
        <label for="ano_publicacao" class="form-label">Ano de Publicação:</label>
        <input type="number" id="ano_publicacao" name="ano_publicacao" class="form-control">
      </div>
      <div class="list-group-item">
        <label for="valor" class="form-label">Valor(R$):</label>
        <input type="text" id="currency" name="valor" class="form-control" placeholder="R$ 0,00">
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Novo</button>
    <a href="{{ url('/livros') }}" class="px-3 py-2 text-black">
      Voltar
    </a>
  </form>
</x-layout>
