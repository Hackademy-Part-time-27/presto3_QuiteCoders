<x-layout :title="$category->name">
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 text-center">
               
                <p class="h2 my-2 fw-bold">Esplora la categoria {{ $category->name }}</p>
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card" >
                                <div class="card2">
                                    <img class="cane img-fluid" src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,267) : 'https://picsum.photos/200' }}" alt="...">
                                <div >
                                    <h5 class="bianco" >{{ $announcement->title }}</h5>
                                    <p class="bianco">{{ $announcement->body }}</p>
                                    <p class="bianco" >{{ $announcement->price }}€</p>
                                    <a href="{{ route('announcements.show', $announcement) }}" class="but link-offset-2 link-underline link-underline-opacity-0">Visualizza</a>
                                    <p class="bianco m-3">Pubblicato il: {{ $announcement->created_at
                                    ->format('d/m/Y') }} - Autore: {{ $announcement->user->name ?? '' }}</p>
                                </div>
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
    <div class="scrol"></div>

    

</x-layout>