<nav class="navbar navbar-expand-lg bgblue fw-bold">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="logo" src="https://scontent.fblq4-1.fna.fbcdn.net/v/t39.30808-6/447757060_3184202685043923_1124900399814019405_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=6lf1i56coeUQ7kNvgHySSQs&_nc_ht=scontent.fblq4-1.fna&oh=00_AYBvo0FCLg3CejASu9myggUR2eITLtVE3lUaoGW6sTB3fA&oe=6668157D" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>{{ __('ui.categories') }}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="categoriesDropdown">
                        @foreach($categories as $index => $category)
                            <li>
                                <a href="{{ route('category.show', compact('category')) }}" class="dropdown-item">
                                    <b>{{ __('ui.categoria_' . $category->id)}}</b>
                                </a>
                                @if($index < count($categories) - 1)
                                    <hr class="dropdown-divider">
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('announcements.index') }}">
                        <b>{{ __('ui.announcements') }}</b>
                    </a>
                </li>
                @auth
                @if (Auth::user()->is_revisor)
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('revisor.index') }}">
                        <b>{{ __('ui.auditorArea') }}</b>
                        <span class=" translate-middle badge rounded-pill bg-danger">
                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                @endif
                @endauth
                <!--<li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('contacts') }}">
                        {{ __('ui.contacts') }}
                    </a>
                </li>-->
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('announcements.create') }}">
                        <i class="fa-solid fa-circle-plus"></i> {{ __('ui.newAnnouncement') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->email }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <!--<li><a class="dropdown-item" href="">Gestione Annunci</a></li>
                        <hr class="dropdown-divider">-->
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('ui.logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="/register">{{ __('ui.register') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/login">{{ __('ui.login') }}</a>
                </li>
                @endauth
            </ul>
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex mt-2 me-2 mt-lg-0">
                <div class="input-group w-100 me-3">
                    <span class="input-group-text bg-white border-0"> 
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
                            <g>
                                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                            </g>
                        </svg>
                    </span> 
                    <input id="query" class="form-control border border-0" type="search" placeholder="{{ __('ui.search') }}" name="searched">
                </div>
                <button class="btn btn-outline-light" type="submit">{{ __('ui.search') }}</button>
            </form>
            <div class="d-flex align-items-center mt-2 mt-lg-0">
        <div class="dropdown">
            <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-earth-asia fs-5"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                <li class="nav-item dropdown-item">
                    <x-_locale lang="it" />
                </li>
                <li class="nav-item dropdown-item">
                    <x-_locale lang="en" />
                </li>
                <li class="nav-item dropdown-item">
                    <x-_locale lang="es" />
                </li>
            </ul>
        </div>
    </div>
        </div>
        
    </div>
    
</nav>
