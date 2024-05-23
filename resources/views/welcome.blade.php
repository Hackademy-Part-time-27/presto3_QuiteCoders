<x-layout :title="$title">
    <div class="container well">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title-blue">{{ $title }}</h1>

                @if (session()->has('access.denied'))
                    <div class="flex flex-row justify-center my-2 alert alert-danger">
                      {{ session('access.denied')}}
                    </div>
                @endif

                
               
                <p class="h2 my-2 fw-bold">Ecco i nostri annunci</p>
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card">
                                <div class="card2">
                                <img class="cane" src="https://picsum.photos/200" alt="...">
                                <div>
                                    <h5 class="bianco" >{{ $announcement->title }}</h5>
                                    <p class="bianco" >{{ $announcement->body }}</p>
                                    <p class="bianco" >{{ $announcement->price }}</p>
                                    <a href="{{ route('announcements.show', $announcement) }}" class="but link-offset-2 link-underline link-underline-opacity-0">Visualizza</a>
                                    <a href="{{ route('category.show', ['category'=>$announcement->category]) }}" class="cate">Categoria: {{ $announcement->category->name }}</a>
                                    <p class="bianco">Pubblicato il: {{ $announcement->created_at
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