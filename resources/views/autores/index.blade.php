<x-layout title="">
  <div class="card mt-3">
    <div class="card-header d-flex justify-content-between flex-wrap">
        <h3 class="mb-2">Lista de Autores</h3>
        <a href="{{ route('autores.create') }}">
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
              <th scope="col" class="text-left">Nome</th>
              <th scope="col" class="text-end">Ações</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($autores as $autor)
              <tr>
                <td>{{ $autor->id_autor }}</td>
                <td>{{ $autor->nome }}</td>
                <td class="d-flex justify-content-end flex-wrap">
                  <a href="{{ route('autores.show', ['autor' => $autor->id_autor]) }}" class="btn btn-sm btn-info me-1 mb-1">Visualizar</a>
                  <a href="{{ route('autores.edit', ['autor' => $autor->id_autor]) }}" class="btn btn-sm btn-primary me-1 mb-1">Editar</a>
                  <form action="{{ route('autores.destroy', ['autor' => $autor->id_autor]) }}" method="POST"
                    onsubmit="return confirm('Deseja excluir este Autor?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger mb-1">Excluir</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center text-danger">Nenhum Autor encontrado!</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout>
