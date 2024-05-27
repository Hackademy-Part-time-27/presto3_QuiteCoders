<nav class="navbar navbar-expand-lg bgblue fw-bold">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{ route('welcome') }}">
      <img class="me-2" src="{{ asset('img/logo.svg') }}" alt="{{ config('app.name') }}">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link dropdown-toggle text-white" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>Categorie</b></a>
          <ul class="dropdown-menu mar dropdown-menu-dark" aria-labelledby="categoriesDropdown">
            @foreach($categories as $category)
            <li>
            <div class="dropdown">
              <a href="{{ route('category.show', compact('category'))}}" class="dropdown-item"><b>{{ ($category->name) }}</b></a>
              <li><hr class="dropdown-divider"></li>
            </li>
            @endforeach
          </ul>
           
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('announcements.index')}}"><b>Annunci</b></a>
        </li>
        @auth
        @if (Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link btn btn-outline-success btn-sm position-relative text-white" aria-current="page" href="{{ route('revisor.index') }}"><b>Zona Revisore</b>
            
            <span class="position-absolute top-0 dtart-100 translate-middle badge rounded-pill bg-danger">
              {{ App\Models\Announcement::toBeRevisionedCount() }}
              <span class="visually-hidden">unread messages</span>
            </span>
          </a>
        </li>
        @endif
        @endauth
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('contacts') }}">Contatti</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item">
          <a class="nav-link active text-white" href="{{ route('announcements.create') }}">
           <i class="fa-solid fa-circle-plus"></i> Nuovo annuncio
          </a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->email }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="">Gestione Annunci</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Esci</button>
                  </form>
                </li>
              </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link text-white" href="/register">Registrati</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/login">Accedi</a>
          </li>
        @endauth
      </ul>
      <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
    <div class="group w-100">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
            <g>
                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
            </g>
        </svg>
        <input id="query" class="input form-control" type="search" placeholder="Cerca" name="searched">
    </div>
    <button class="but" type="submit">Cerca</button>
      </form>
    </div>
    </div>
    <div>

      <div class="dropdown nav-link dropdown-toggle text-white">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lingue
          </button>
          <ul class="dropdown-menu mar dropdown-menu-dark">
            <li class="nav-item dropdown-item">
                <x-_locale lang="it"/>
            </li>
            <li class="nav-item dropdown-item">
                <x-_locale lang="en"/>
            </li>
            <li class="nav-item dropdown-item">
                <x-_locale lang="es"/>
            </li>
          </ul>
      </div>

    </div>
</nav>