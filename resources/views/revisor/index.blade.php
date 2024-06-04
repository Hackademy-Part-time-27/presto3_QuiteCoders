<x-layout>
    <h1 class="container text-center">
        {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}
    </h1>
    @if($announcement_to_check)
    <div class="container scrol">
        <div class="row">
        <div class="corpo col-5">
        @if ($announcement_to_check->images)
            <div class="carousel" id="test1">
            @foreach($announcement_to_check->images as $image)
                <input class="input " type="radio" name="item" value="1" checked>
                <div>
                <img src="{{ $image->getUrl(400,300) }}">
                </div>
                <div class="col-md-3 border-end">
                    <h5 class="tc-accent mt-3">
                        Tags
                    </h5>
                    <div class="p-2">
                        @if ($image->labels)
                        @foreach ($image->labels as $label)
                        <p class="d-inline">
                            {{ $label }}
                        </p>
                        @endforeach
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
            @endif
            <h5 class="card-title">Titolo: {{ $announcement_to_check->title }}</h5>
            <p class="card-text">Descrizione: {{ $announcement_to_check->body }}</p>
            <p class="card-footer">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
        </div> 
        <div class="col-3">
            <div class="card-body fs-5 text-lg-end p-5">
                <h5 class="tc-accent">Revisione Immagini</h5>
                <p>Adulti: <span class="{{$image->adult}}"></span></p>
                <p>Satira: <span class="{{$image->spoof}}"></span></p>
                <p>Medicina: <span class="{{$image->medical}}"></span></p>
                <p>Violenza: <span class="{{$image->violence}}"></span></p>
                <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
            </div>
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