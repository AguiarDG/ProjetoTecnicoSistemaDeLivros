<x-layout title="">
  <div class="card mt-3">
    <div class="card-header d-flex justify-content-between flex-wrap">
        <h3 class="mb-2">Lista de Livros</h3>
        <a href="{{ route('livros.create') }}">
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
              <th scope="col" class="text-left">Título</th>
              <th scope="col" class="text-left">Assunto</th>
              <th scope="col" class="text-left">Autor(es)</th>
              <th scope="col" class="text-left">Editora</th>
              <th scope="col" class="text-left">Edição</th>
              <th scope="col" class="text-left">Ano de Publicação</th>
              <th scope="col" class="text-left">Valor</th>
              <th scope="col" class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($livros as $livro)
              <tr>
                <td>{{ $livro->id_livro }}</td>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->assunto }}</td>
                <td>{{ $livro->autor }}</td>
                <td>{{ $livro->editora }}</td>
                <td>{{ $livro->edicao }}</td>
                <td>{{ $livro->ano_publicacao }}</td>
                <td>{{ 'R$' . number_format($livro->valor, 2, ',', '.') }}</td>
                <td class="d-flex justify-content-center flex-wrap">
                  <a href="{{ route('livros.show', ['livro' => $livro->id_livro]) }}" class="btn btn-sm btn-info me-1 mb-1">Visualizar</a>
                  <a href="{{ route('livros.edit', ['livro' => $livro->id_livro]) }}" class="btn btn-sm btn-primary me-1 mb-1">Editar</a>
                  <form action="{{ route('livros.destroy', ['livro' => $livro->id_livro]) }}" method="POST"
                    onsubmit="return confirm('Deseja excluir este Livro?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger mb-1">
                      Excluir
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center text-danger">Nenhum Livro encontrado!</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout>
