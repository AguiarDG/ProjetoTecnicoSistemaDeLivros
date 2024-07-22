<x-layout title="Editar Livro">
  @if ($errors->any())
    <span style="color: #ff0000;">
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
    </span>
    <br>
  @endif

  <form id="form-livro" action="{{ route('livros.update', ['livro' => $livro->id_livro]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3 list-group">
      <div class="list-group-item">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" id="titulo" name="titulo" class="form-control maxlength-40"
            value="{{ old('titulo', $livro->titulo) }}">
        <small id="charCount" class="form-text text-muted">0/40 caracteres</small>
      </div>
      <div class="list-group-item">
        <label for="assunto" class="form-label">Assunto:</label>
        <select name="assunto" id="assunto" class="form-control">
          <option selected>Selecione uma opção</option>
          @foreach ($assuntos as $assunto)
            <option value="{{ $assunto->id_assunto }}"
              {{ $assunto->id_assunto == $livro->id_assunto ? 'selected' : '' }}>
              {{ $assunto->descricao }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="list-group-item">
        <label for="autor" class="form-label">Autor:</label>
        <select name="autores[]" id="autor" class="form-control select2" multiple="multiple">
          @foreach ($autores as $autor)
            <option value="{{ $autor->id_autor }}"
                {{ strstr($livro->id_autor, $autor->id_autor) ? 'selected' : '' }}>
                {{ $autor->nome }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="list-group-item">
        <label for="editora" class="form-label">Editora:</label>
        <input type="text" id="editora" name="editora" class="form-control maxlength-40"
            value="{{ old('editora', $livro->editora) }}">
        <small id="charCount" class="form-text text-muted">0/40 caracteres</small>
      </div>
      <div class="list-group-item">
        <label for="edicao" class="form-label">Edição:</label>
        <input type="text" id="edicao" name="edicao" class="form-control"
            value="{{ old('edicao', $livro->edicao) }}">
      </div>
      <div class="list-group-item">
        <label for="ano_publicacao" class="form-label">Ano de Publicação:</label>
        <input type="text" id="ano_publicacao" name="ano_publicacao" class="form-control"
            value="{{ old('ano_publicacao', $livro->ano_publicacao) }}">
      </div>
      <div class="list-group-item">
        <label for="valor" class="form-label">Valor(R$):</label>
        <input type="text" id="currency" name="valor" class="form-control"
            value="{{ old('valor', $livro->valor) }}">
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">
      Salvar
    </button>
    <a href="{{ url('/livros') }}" class="px-3 py-2 text-black">
        Voltar
    </a>
  </form>
</x-layout>
