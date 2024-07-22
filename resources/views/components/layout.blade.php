<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
  <title>Sistema de Livros</title>
  @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li class="mr-4">
            <a href="{{ url('/') }}" class="nav-link px-2 text-secondary text-white {{ Request::is('/') ? 'active' : '' }}">
                Início
            </a>
          </li>
          <li class="mr-4">
            <a href="{{ url('/livros') }}" class="nav-link px-2 text-secondary text-white {{ Request::is('livros', 'livros/*') ? 'active' : '' }}">
                Livros
            </a>
          </li>
          <li class="mr-4">
            <a href="{{ url('/assuntos') }}" class="nav-link px-2 text-secondary text-white {{ Request::is('assuntos', 'assuntos/*') ? 'active' : '' }}">
                Assuntos
            </a>
          </li>
          <li class="mr-4">
            <a href="{{ url('/autores') }}" class="nav-link px-2 text-secondary text-white {{ Request::is('autores', 'autores/*') ? 'active' : '' }}">
                Autores
            </a>
          </li>
          <li class="mr-4 ml-5">
            <a href="{{ route('report.generatePDF', ['page' => (request()->path() !== '/' ? Str::replaceFirst('/', '', request()->path()) : "home") ]) }}"
                class="btn btn-primary px-2 text-secondary text-white {{ Request::is('/', 'livros', 'assuntos', 'autores') ? '' : 'disabled' }}"
                style="margin-left: 20px;">
                Gerar Relatório
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="mt-6 content">
    <div class="container mt-2">
      <h2 class="text-xl font-semibold text-black">
        {{ $title }}
      </h2>
      @if (session('success'))
        <div class="alert alert-success alert-dismissible m-3" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif (session('warning'))
        <div class="alert alert-warning alert-dismissible m-3" role="alert">
          {{ session('warning') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif (session('danger'))
        <div class="alert alert-danger alert-dismissible m-3" role="alert">
          {{ session('danger') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="">
        {{ $slot }}
      </div>
    </div>
  </main>

  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    </ul>
    <p class="text-center text-muted">© 2024 <a href="http://github.com/AguiarDG" target="_blank">@AguiarDG</a></p>
  </footer>
</body>

</html>
