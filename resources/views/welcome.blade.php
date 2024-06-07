<x-layout :title="$title">
    <div class="container well">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="title-blue">{{ __('ui.welcome') }}</h1>

                @if (session()->has('access.denied'))
                    <div class="flex flex-row justify-center my-2 alert alert-danger">
                      {{ session('access.denied')}}
                    </div>
                @endif
                <p class="h2 my-2 mt-5 fw-bold">{{__('ui.allAnnouncements')}}</p>

                @guest
                <div class="mt-5 fs-3">
                    <a class="nav-link active text-white" href="{{ route('announcements.create') }}">
                        <i class="fa-solid fa-circle-plus"></i> {{ __('ui.newAnnouncement') }}
                    </a>
                </div>
                @endguest
                
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4 mt-5">
                            <div class="card">
                                <div class="card2">
                                <img class="cane img-fluid rounded" src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,267) : 'https://picsum.photos/200' }}" alt="...">
                                <div>
                                    <h5 class="bianco" >{{ $announcement->title }}</h5>
                                    <p class="bianco" >{{ $announcement->body }}</p>
                                    <p class="bianco" >{{ $announcement->price }} €</p>
                                    <a href="{{ route('announcements.show', $announcement) }}" class="but link-offset-2 link-underline link-underline-opacity-0">{{__('ui.view')}}</a>
                                    <p class="m-3">
                                    <a href="{{ route('category.show', ['category'=>$announcement->category]) }}" class="link-offset-2 link-underline link-underline-opacity-0">{{ __('ui.categoria_' . $announcement->category->id)}}</a>
                                    </p>
                                    <p class="bianco">{{__('ui.published')}} {{ $announcement->created_at
                                    ->format('d/m/Y') }}</p>
                                </div>
                                
                                </div>
                            </div>
                        </div>

                        @empty 

                        <div class="col-12">
                            <div class="alert alert-warning py-3 shadow">
                                <h2 class="lead">Non sono stati ancora caricati articoli. Creane uno!</h2>
                            </div>
                        </div>

                        @endforelse
                </div>
               
            </div>
        </div>
    </div>
    

</x-layout>