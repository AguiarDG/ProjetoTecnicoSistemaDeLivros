<x-layout title="Editar Autor">
  <form action="{{ route('autores.update', ['autor' => $autor->id_autor]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3 list-group">
      <div class="list-group-item">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control maxlength-40"
            value="{{ old('nome', $autor->nome) }}">
        <small id="charCount" class="form-text text-muted">0/40 caracteres</small>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    <a href="{{ url('/autores') }}" class="px-3 py-2 text-black">
        Voltar
    </a>
  </form>
</x-layout>
