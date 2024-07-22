<x-layout title="Novo Assunto">
  <form action="{{ route('assuntos.save') }}" method="post">
    @csrf
    <div class="mb-3 list-group">
      <div class="list-group-item">
        <label for="descricao" class="form-label">Assunto:</label>
        <input type="text" id="descricao" name="descricao" class="form-control maxlength-20">
        <small id="charCount" class="form-text text-muted">0/20 caracteres</small>
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">
      Novo
    </button>
    <a href="{{ url('/assuntos') }}" class="px-3 py-2 text-black">
      Voltar
    </a>
  </form>
</x-layout>
