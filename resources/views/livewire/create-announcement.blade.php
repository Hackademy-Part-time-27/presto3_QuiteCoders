<div>
    <h1>Crea il tuo annuncio!</h1>

    @if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message')}}
        </div>
    @endif

    <form wire:submit="store">
        @csrf

        <div class="mb-3">
            <label for="title">Titolo Annuncio</label>
            <input wire:model.live="title" type="text" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
                {{$message}}
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="body">Descrizione</label>
            <textarea wire:model.live="body" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">Prezzo</label>
            <input wire:model.live="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror">
            @error('price')
                {{$message}}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary shadow px-4 py-2">Crea</button>

    </form>
</div>
