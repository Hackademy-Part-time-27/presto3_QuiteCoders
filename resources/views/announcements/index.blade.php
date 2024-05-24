<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2">Ecco i nostri annunci</h1>
            </div>
        </div>
    </div>
    <div class="container spa">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($announcements as $announcement)
                    <div class="col-12 col-md-4 my-4">
                        <div class="card-shadow" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-image-top p-3 rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->body }}</p>
                                <p class="card-text">{{ $announcement->price }}</p>
                                <a href="{{ route('announcements.show', compact('announcement')) }}" 
                                class="btn btn-primary shadow">Visualizza</a>
                                <a href="{{ route('category.show', ['category'=>$announcement->category]) }}"
                                class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">
                                Categoria: {{ $announcement->category->name }}</a>
                                <p class="card-footer">Pubblicato il: {{ $announcement->created_at
                                ->format('d/m/Y') }} -Autore {{ $announcement->user->name ?? '' }}</p>
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
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>