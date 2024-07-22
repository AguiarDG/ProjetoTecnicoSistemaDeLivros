<x-layout title="">
  <div class="card mt-3">
    <div class="card-header d-flex justify-content-between flex-wrap">
        <h3 class="mb-2">Lista de Assuntos</h3>
        <a href="{{ route('assuntos.create') }}">
            <button type="button" class="btn btn-success mb-2">
                Novo
            </button>
        </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="text-left">#</th>
              <th scope="col" class="text-left">Assunto</th>
              <th scope="col" class="text-end">Ações</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($assuntos as $assunto)
              <tr>
                <td>{{ $assunto->id_assunto }}</td>
                <td>{{ $assunto->descricao }}</td>
                <td class="d-flex justify-content-end flex-wrap">
                  <a href="{{ route('assuntos.show', ['assunto' => $assunto->id_assunto]) }}" class="btn btn-sm btn-info me-1 mb-1">Visualizar</a>
                  <a href="{{ route('assuntos.edit', ['assunto' => $assunto->id_assunto]) }}" class="btn btn-sm btn-primary me-1 mb-1">Editar</a>
                  <form action="{{ route('assuntos.destroy', ['assunto' => $assunto->id_assunto]) }}" method="POST"
                    onsubmit="return confirm('Deseja excluir este Assunto?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger mb-1">Excluir</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center text-danger">Nenhum Assunto encontrado!</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout>
