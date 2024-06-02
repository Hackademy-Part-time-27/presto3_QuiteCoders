<x-layout>
    <h1>
        {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}
    </h1>
    @if($announcement_to_check)
    <div class="container scrol">
        <div class="corpo">
        @if ($announcement_to_check->images)
            <div class="carousel" id="test1">
            @foreach($announcement_to_check->images as $image)
                <input class="input " type="radio" name="item" value="1" checked>
                <div>
                <img src="{{ $image->getUrl(400,300) }}">
                </div>
                @endforeach

            </div>
            @endif
            <h5 class="card-title">Titolo: {{ $announcement_to_check->title }}</h5>
            <p class="card-text">Descrizione: {{ $announcement_to_check->body }}</p>
            <p class="card-footer">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
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