<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">
                    {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}
                </h1>
            </div>
        </div>
    </div>
    <!-- inizio user story 5 minuto 23.35 (modificare carousel)-->
    @if($announcement_to_check)
    <div class="container spa">
        <div class="row">
            <div class="col-12">
                <div id="showImages" class="caro" data-bs-ride="carousel">
                    @if ($announcement_to_check->images)
                    <div class="carousel-inner">
                        @foreach ($announcement_to_check->images as $image)
                    <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{ Storage::url($image->path) }}" alt="..." class="img-fluid p-3 rounded">
                    </div>
                    @endforeach
                </div>
                @else
                 <x-carosello />
                </div>
                @endif
                <h5 class="card-title">Titolo: {{ $announcement_to_check->title }}</h5>
                <p class="card-text">Descrizione: {{ $announcement_to_check->body }}</p>
                <p class="card-footer">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="{{ route('revisor.accept_announcement', ['announcement'=> $announcement_to_check]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-success shadow" type="submit">Accetta</button>
                </form>
            </div>
            <div class="col-12 col-md-6 text-end">
                <form action="{{ route('revisor.reject_announcement', ['announcement'=> $announcement_to_check])}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger shadow" type="submit">Rifiuta</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</x-layout>