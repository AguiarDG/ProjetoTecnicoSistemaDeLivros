<x-layout title="Novo Autor">
  <form action="{{ route('autores.save') }}" method="post">
    @csrf
    <div class="mb-3 list-group">
      <div class="list-group-item">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control maxlength-40">
        <small id="charCount" class="form-text text-muted">0/40 caracteres</small>
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Novo</button>
    <a href="{{ url('/autores') }}" class="px-3 py-2 text-black">
      Voltar
    </a>
  </form>
</x-layout>
