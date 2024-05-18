<x-layout :title="$category->name">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
               
                <p class="h2 my-2 fw-bold">Esplora la categoria {{ $category->name }}</p>
                <div class="row">
                    @forelse ($category->announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/id/237/200/300" class="card-img-top p-3 rounded" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                    <p class="card-text">{{ $announcement->body }}</p>
                                    <p class="card-text">{{ $announcement->price }}</p>
                                    <a href="" class="btn btn-primary shadow">Visualizza</a>
                                    <p class="card-footer">Pubblicato il: {{ $announcement->created_at
                                    ->format('d/m/Y') }} - Autore: {{ $announcement->user->name ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="h1 mt-4">Non sono presenti annunci per questa categoria!</p>
                            <p class="h2 mt-4">Pubblicane uno: <a href="{{ route('announcements.create') }}"><button class="btn btn-success shadow">Nuovo Annuncio</button></a></p>
                        </div>
                        @endforelse
                </div>
               
            </div>
        </div>
    </div>
    

</x-layout>