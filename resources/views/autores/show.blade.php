<x-layout title="">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <span><h3>Visualizar Autor</h3></span>
      <span>
          <a href="{{ route('autores.index') }}" class="btn btn-info mb-2">
              Voltar para Lista
          </a>
      </span>
    </div>

    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">#</dt>
        <dd class="col-sm-9">{{ $autor->id_autor }}</dd>
        <dt class="col-sm-3">Nome</dt>
        <dd class="col-sm-9">{{ $autor->nome }}</dd>
      </dl>
    </div>
  </div>
</x-layout>
