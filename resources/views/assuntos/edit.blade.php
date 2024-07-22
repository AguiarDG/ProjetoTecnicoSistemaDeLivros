<x-layout title="Editar Assunto">
  @if ($errors->any())
    <span style="color: #ff0000;">
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
    </span>
    <br>
  @endif

  <form action="{{ route('assuntos.update', ['assunto' => $assunto->id_assunto]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3 list-group">
      <div class="list-group-item">
        <label for="descricao" class="form-label">Assunto:</label>
        <input type="text" id="descricao" name="descricao" class="form-control maxlength-20"
            value="{{ old('descricao', $assunto->descricao) }}">
        <small id="charCount" class="form-text text-muted">0/20 caracteres</small>
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    <a href="{{ url('/assuntos') }}" class="px-3 py-2 text-black">
        Voltar
    </a>
  </form>
</x-layout>
