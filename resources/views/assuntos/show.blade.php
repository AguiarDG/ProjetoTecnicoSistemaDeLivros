<x-layout title="">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <span><h3>Visualizar Assunto</h3></span>
      <span>
          <a href="{{ route('assuntos.index') }}" class="btn btn-info mb-2">
              Voltar para Lista
          </a>
      </span>
    </div>

    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">#</dt>
        <dd class="col-sm-9">{{ $assunto->id_assunto }}</dd>
        <dt class="col-sm-3">Assunto</dt>
        <dd class="col-sm-9">{{ $assunto->descricao }}</dd>
      </dl>
    </div>
  </div>
</x-layout>
