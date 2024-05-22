<nav class="navbar navbar-expand-lg bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('welcome') }}">
      <img class="me-2" src="{{ asset('img/logo.svg') }}" alt="{{ config('app.name') }}">
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="
          #" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach($categories as $category)
            <li>
              <a href="{{ route('category.show', compact('category'))}}" class="dropdown-item">{{ ($category->name) }}</a>
              <li><hr class="dropdown-divider"></li>
            </li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('announcements.index')}}">Annunci</a>
        </li>
        @auth
        @if (Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link btn btn-outline-success btn-sm position-relative" aria-current="page" href="{{ route('revisor.index') }}">
            zona revisore
            <span class="position-absolute top-0 dtart-100 translate-middle badge rounded-pill bg-danger">
              {{App\Models\Announcement::toBeRevisionedCount()}}
              <span class= "visually-hidden">unread messages</span>
            </span>
          </a>
        </li>
          @endif
          
          @endauth
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacts') }}">Contatti</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('announcements.create') }}">Nuovo annuncio</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link" href="/register">Registrati</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Accedi</a>
          </li>
        @endauth
      </ul>
      <form action="{{route('announcements.search')}}" method="GET" class="d-flex">
        <input type="search" name="searched" class="form-control me-2" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>