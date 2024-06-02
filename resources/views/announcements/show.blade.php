<x-layout>
    <div class="corpo">   
        <h1 class="display-2">{{ $announcement->title }}</h1> 
        <div class="container m-5">
            <div class="row">
                <div class="col-12 h-30">
                    
                    <x-carousel :images="$announcement->images" />
                    <!--<h5 class="card-title">Titolo: {{ $announcement->title }}</h5>-->
                    <p class="card-text">Descrizione: {{ $announcement->body }}</p>
                    <p class="card-text">Prezzo: {{ $announcement->price }} €</p>
                    <a href="{{ route('category.show', ['category'=>$announcement->category]) }}" 
                    class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">
                    Categoria: {{ $announcement->category->name }}</a>
                    <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }} 
                    -Autore {{ $announcement->user->name ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>